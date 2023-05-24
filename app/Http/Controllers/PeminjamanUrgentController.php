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
            'email' => ['required', 'email:dns', 'unique:users'],
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
            'ttd' => 'required|file|image',
            // penambahan rule untuk ttd dan up_ket
            'up_ket' => 'required|file|image',
        ], $messages);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        $amount = str_replace(",", "", $request->jumlah); // menghapus tanda koma

        $loan = PeminjamanUrgent::create([
            'user_id' => $request->user_id,
            'jenis_pinjaman' => $request->flexRadioDefault,
            'no_nik' => $request->no_nik,
            'alamat' => $request->alamat,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'bagian' => $request->bagian,
            'dosen_staff' => $request->dosen_staff,
            'no_rek' => $request->no_rek,
            'email' => $request->email,
            'alasan_pinjam' => $request->alasan_pinjam,
            'amount' => $amount,
            'amount_per_month' => $amount / $request->duration,
            'duration' => $request->duration,
            'status' => 'Menunggu',
            // penambahan rule untuk ttd dan up_ket
            'ttd' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'up_ket' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

        ]);

        // upload dan simpan ttd
        if ($request->file('ttd')) {
            $loan->ttd = $request->file('ttd')->store('post-images', 'public');
        }

        // upload dan simpan up_ket
        if ($request->file('up_ket')) {
            $loan->up_ket = $request->file('up_ket')->store('post-images', 'public');
        }

        $loan->save(); // Menyimpan perubahan file ke database

        return redirect()->route('dashboard_anggota', $loan)->with('success', 'Pengajuan peminjaman berhasil silahkan tunggu verifikasi.');
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