<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersentaseAdmin;
use App\Models\PersentaseBunga;
use App\Models\PeminjamanKhusus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\PeminjamanKhususNotification;
use App\Mail\PeminjamanKhususStatusNotification;
use App\Mail\PeminjamanKhususRejectedNotification;

class PeminjamanKhususController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form()
    {
        $biayaBungaKhusus = PersentaseBunga::where('nama', 'Bunga Pinjaman Konsumtif Khusus')->first();
        $biayaBungaBiasa = PersentaseBunga::where('nama', 'Bunga Pinjaman Konsumtif Biasa')->first();
        $biayaAdmin = PersentaseAdmin::first();
        $title = 'Formulir Permohonan Pinjaman Konsumtif Khusus';

        return view('peminjaman.khusus', [
            'title' => $title,
            'biayaBungaKhusus' => $biayaBungaKhusus,
            'biayaBungaBiasa' => $biayaBungaBiasa,
            'biayaAdmin' => $biayaAdmin
        ], compact( 'title'));
        // return view('peminjaman.biasa', compact( 'title'));
    }

    public function index()
    {
        $loans = PeminjamanKhusus::all();
        $title = 'Daftar Pinjaman Konsumtif Khusus';
        return view('PengajuanPeminjamanKhusus.index', compact('loans', 'title'));
    }


    public function create()
    {
        return view('peminjaman.khusus', [
            'title' => 'Dashboard'
        ]);
    }

    public function store(Request $request)
    {
        $messages = [
            'jumlah.max' => 'Jumlah pinjaman tidak bisa lebih dari 300 juta.',
            'jumlah.min' => 'Jumlah pinjaman tidak bisa kurang dari 10 juta.',
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
            'jumlah' => [
                'required',
                'numeric',
                'min:10000000',
                'max:300000000',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'duration' => 'required|integer',
            'signature' => 'required',
            'up_ket' => 'required|file|image',
        ], $messages);

        $user_id = Auth::id();

        $amount = str_replace(",", "", $request->jumlah); // menghapus tanda koma

        $biayaBungaBiasa = PersentaseBunga::where('nama', 'Bunga Pinjaman Konsumtif Khusus')->first(); //untuk input id persentase_bunga

        $biayaAdmin = PersentaseAdmin::first();

        $loan = new PeminjamanKhusus();
        $loan->user_id = $user_id;
        $loan->biayaBunga_id = $biayaBungaBiasa->id;
        $loan->biayaAdmin_id = $biayaAdmin->id;
        $loan->no_nik = $request->no_nik;
        $loan->alamat = $request->alamat;
        $loan->nama = $request->nama;
        $loan->no_hp = $request->no_hp;
        $loan->bagian = $request->bagian;
        $loan->dosen_staff = $request->dosen_staff;
        $loan->no_rek = $request->no_rek;
        $loan->email = $request->email;
        $loan->amount = $amount;
        $loan->alasan_pinjam = $request->alasan_pinjam;
        $loan->duration = $request->duration;
        $loan->status = 'Menunggu Pengawas';

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

    public function show(PeminjamanKhusus $loan)
    {
        $title = 'Detail Peminjaman';
        return view('PengajuanPeminjamanKhusus.show', compact('loan', 'title'));
    }
    public function detail(PeminjamanKhusus $loan)
    {
        $title = 'Detail';
        return view('PengajuanPeminjamanKhusus.detail', compact('loan', 'title'));
    }

    public function verifyPengawas(PeminjamanKhusus $loan)
    {
        // Cek apakah user saat ini adalah bendahara
        if (Auth::user()->id_roles == 5) {
            $loan->update([
                'status' => 'Menunggu Bendahara',
            ]);

            // Kirim email pemberitahuan
            Mail::to($loan->email)->send(new PeminjamanKhususStatusNotification($loan));


            return redirect()->route('pinjamanan.khusus.index')->with('success', 'Pengajuan Pinjaman berhasil diverifikasi oleh Pengawas');
        } else {
            return redirect()->route('pinjamanan.khusus.index')->with('error', 'Anda bukan Pengawas dan tidak memiliki izin untuk melakukan verifikasi ini');
        }
    }

    public function verifyBendahara(PeminjamanKhusus $loan)
    {
        // Cek apakah user saat ini adalah bendahara
        if (Auth::user()->id_roles == 4) {
            $loan->update([
                'status' => 'Menunggu SDM',
            ]);

            // Kirim email pemberitahuan
            Mail::to($loan->email)->send(new PeminjamanKhususStatusNotification($loan));


            return redirect()->route('pinjamanan.khusus.index')->with('success', 'Pengajuan Pinjaman berhasil diverifikasi oleh Bendahara');
        } else {
            return redirect()->route('pinjamanan.khusus.index')->with('error', 'Anda bukan Bendahara dan tidak memiliki izin untuk melakukan verifikasi ini');
        }
    }

    public function verifySDM(PeminjamanKhusus $loan)
    {
        // Cek apakah user saat ini adalah bendahara
        if (Auth::user()->id_roles == 3) {
            $loan->update([
                'status' => 'Menunggu Kepala Bagian',
            ]);

            // Kirim email pemberitahuan
            Mail::to($loan->email)->send(new PeminjamanKhususStatusNotification($loan));


            return redirect()->route('pinjamanan.khusus.index')->with('success', 'Pengajuan Pinjaman berhasil diverifikasi oleh SDM');
        } else {
            return redirect()->route('pinjamanan.khusus.index')->with('error', 'Anda bukan SDM dan tidak memiliki izin untuk melakukan verifikasi ini');
        }
    }

    public function verifyKepalaBagian(PeminjamanKhusus $loan)
    {
        // Cek apakah user saat ini adalah bendahara
        if (Auth::user()->id_roles == 2) {
            $loan->update([
                'status' => 'Menunggu Ketua',
            ]);

            // Kirim email pemberitahuan
            Mail::to($loan->email)->send(new PeminjamanKhususStatusNotification($loan));


            return redirect()->route('pinjamanan.khusus.index')->with('success', 'Pengajuan Pinjaman berhasil diverifikasi oleh Kepala Bagian');
        } else {
            return redirect()->route('pinjamanan.khusus.index')->with('error', 'Anda bukan Kepala Bagian dan tidak memiliki izin untuk melakukan verifikasi ini');
        }
    }

    public function verifyKetua(PeminjamanKhusus $loan)
    {
        // Cek apakah user saat ini adalah ketua
        if (Auth::user()->id_roles == 1) {
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
            Mail::to($loan->email)->send(new PeminjamanKhususNotification($emailData));

            return redirect()->route('pinjamanan.khusus.index')->with('success', 'Pengajuan Pinjaman berhasil disetujui');
        } else {
            return redirect()->route('pinjamanan.khusus.index')->with('error', 'Anda bukan Ketua dan tidak memiliki izin untuk melakukan verifikasi ini');
        }
    }

    public function reject(Request $request, PeminjamanKhusus $loan)
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
        Mail::to($loan->email)->send(new PeminjamanKhususRejectedNotification($emailData));

        return redirect()->route('pinjamanan.khusus.index')->with('success', 'Pengajuan Pinjaman berhasil ditolak');
    }
}
