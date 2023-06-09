<?php

namespace App\Http\Controllers;

use App\Mail\PeminjamanUrgentRejectedNotification;
use Illuminate\Http\Request;
use App\Models\PeminjamanUrgent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\PeminjamanUrgentNotification;
use App\Mail\PeminjamanUrgentStatusNotification;

class PeminjamanUrgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form()
    {

        $title = 'FORMULIR PERMOHONAN PEMINJAMAN URGENT';
        $user = auth()->user(); // mendapatkan pengguna yang sedang aktif
        return view('peminjaman.urgent', compact('title', 'user'));

    }


    public function index()
    {
        // Mengurutkan berdasarkan status, dengan "Ditolak" di bagian bawah
        $loans = PeminjamanUrgent::orderByRaw("status = 'Ditolak'")->get();
        $title = 'DAFTAR PINJAMAN MENDESAK';
        return view('PengajuanPeminjaman.index', compact('loans', 'title'));
    }


    public function create()
    {
        return view('peminjaman.urgent.urgent', [
            'title' => 'Dashboard'
        ]);
    }

    public function store(Request $request)
    {
        $messages = [
            'jumlah.max' => 'Jumlah pinjaman tidak bisa lebih dari 3 juta.',
        ];

        $request->validate([
            'no_nik' => 'required|string',
            'alamat' => 'required|string',
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'bagian' => 'required|string',
            'dosen_staff' => 'required|string',
            'email' => ['required', 'email:dns'],
            'no_rek' => 'required',
            'alasan_pinjam' => 'required',
            'flexRadioDefault' => 'required|string',
            'jumlah' => [
                'required',
                'numeric',
                'max:3000000',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'duration' => 'required|integer',
            'up_ket' => 'required|file|image',
            'signature' => 'required',
        ], $messages);

        $user_id = Auth::id();

        $amount = str_replace(",", "", $request->jumlah); // menghapus tanda koma


        $loan = new PeminjamanUrgent();
        $loan->user_id = $user_id;
        $loan->jenis_pinjaman = $request->flexRadioDefault;
        $loan->no_nik = $request->no_nik;
        $loan->alamat = $request->alamat;
        $loan->nama = $request->nama;
        $loan->no_hp = $request->no_hp;
        $loan->bagian = $request->bagian;
        $loan->dosen_staff = $request->dosen_staff;
        $loan->no_rek = $request->no_rek;
        $loan->email = $request->email;
        $loan->alasan_pinjam = $request->alasan_pinjam;
        $loan->amount = $amount;
        $loan->remaining_amount = $amount; // Set remaining_amount equal to amount here
        $loan->amount_per_month = $amount / $request->duration;
        $loan->duration = $request->duration;
        $loan->status = 'Menunggu Bendahara';

        // Upload dan simpan ttd
        if ($request->has('signature')) {
            $signature = $request->input('signature');
            $ttdPath = 'signatures/' . time() . '.png';
            $this->saveSignatureToImage($signature, public_path($ttdPath));
            $loan->ttd = $ttdPath;
        }

        // Upload dan simpan up_ket
        if ($request->file('up_ket')) {
            $upKetPath = $request->file('up_ket')->store('public/post-images');
            $loan->up_ket = $upKetPath;
        }

        $loan->save(); // Menyimpan data ke database

        return redirect()->route('dashboard_anggota')->with('success', 'Pengajuan peminjaman berhasil silahkan tunggu verifikasi.');
    }

    private function saveSignatureToImage($signatureData, $path)
    {
        $data = explode(',', $signatureData);
        $decodedImage = base64_decode($data[1]);
        $ttdPath = 'signatures/' . time() . '.png';
        Storage::disk('public')->put($ttdPath, $decodedImage);

    }

    public function show(PeminjamanUrgent $loan)
    {
        $title = 'Detail Peminjaman';
        return view('PengajuanPeminjaman.show', compact('loan', 'title'));
    }

    public function detail(PeminjamanUrgent $loan)
    {
        $title = 'Detail';
        return view('PengajuanPeminjaman.detail', compact('loan', 'title'));
    }


    public function verifyBendahara(PeminjamanUrgent $loan)
    {
        // Cek apakah user saat ini adalah bendahara
        if (Auth::user()->is_bendahara) {
            $loan->update([
                'status' => 'Menunggu Ketua',
            ]);

            // Kirim email pemberitahuan
            Mail::to($loan->email)->send(new PeminjamanUrgentStatusNotification($loan));


            return redirect()->route('pinjamanan.urgent.index')->with('success', 'Pengajuan Pinjaman berhasil diverifikasi oleh Bendahara');
        } else {
            return redirect()->route('pinjamanan.urgent.index')->with('error', 'Anda bukan Bendahara dan tidak memiliki izin untuk melakukan verifikasi ini');
        }
    }

    public function verifyKetua(PeminjamanUrgent $loan)
    {
        // Cek apakah user saat ini adalah ketua
        if (Auth::user()->is_ketua) {
            $loan->update([
                'status' => 'Disetujui',
                'repayment_date' => now()->addMonths($loan->duration),
            ]);

            // Kirim email pemberitahuan
            $emailData = [
                'amount' => $loan->amount,
                'no_rek_bni' => $loan->no_rek,
                'amount_per_month' => $loan->amount_per_month,
                'duration' => $loan->duration,
            ];
            Mail::to($loan->email)->send(new PeminjamanUrgentNotification($emailData));

            return redirect()->route('pinjamanan.urgent.index')->with('success', 'Pengajuan Pinjaman berhasil disetujui');
        } else {
            return redirect()->route('pinjamanan.urgent.index')->with('error', 'Anda bukan Ketua dan tidak memiliki izin untuk melakukan verifikasi ini');
        }
    }


    public function reject(Request $request, PeminjamanUrgent $loan)
    {
        $request->validate([
            'keterangan_tolak' => 'required',
        ]);

        $loan->update([
            'status' => 'Ditolak',
            'keterangan_tolak' => $request->keterangan_tolak,
        ]);

        // Kirim email pemberitahuan
        $emailData = [
            'status' => $loan->status,
            'keterangan_tolak' => $loan->keterangan_tolak,
        ];
        Mail::to($loan->email)->send(new PeminjamanUrgentRejectedNotification($emailData));

        return redirect()->route('pinjamanan.urgent.index')->with('success', 'Pengajuan Pinjaman berhasil ditolak');
    }



}