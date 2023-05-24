<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanUrgent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $loans = PeminjamanUrgent::all();
        $title = 'Daftar Peminjaman';
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
        $loan->amount_per_month = $amount / $request->duration;
        $loan->duration = $request->duration;
        $loan->status = 'Menunggu';

        // Upload dan simpan ttd
        if ($request->has('signature')) {
            $signature = $request->input('signature');
            $ttdPath = 'signatures/' . time() . '.png';
            $this->saveSignatureToImage($signature, $ttdPath);
            $loan->ttd = $ttdPath;
        }

        // Upload dan simpan up_ket
        if ($request->file('up_ket')) {
            $upKetPath = $request->file('up_ket')->store('post-images', 'public');
            $loan->up_ket = $upKetPath;
        }

        $loan->save(); // Menyimpan data ke database

        return redirect()->route('dashboard_anggota')->with('success', 'Pengajuan peminjaman berhasil silahkan tunggu verifikasi.');
    }

    private function saveSignatureToImage($signatureData, $path)
    {
        $data = explode(',', $signatureData);
        $decodedImage = base64_decode($data[1]);
        $fullPath = public_path($path);
        file_put_contents($fullPath, $decodedImage);
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

    public function verify(PeminjamanUrgent $loan)
    {
        $loan->update([
            'status' => 'Disetujui',
            'repayment_date' => now()->addMonths($loan->duration)
        ]);
        return redirect()->back();
    }

}