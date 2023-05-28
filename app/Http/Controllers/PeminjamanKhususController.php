<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersentaseAdmin;
use App\Models\PersentaseBunga;
use App\Models\PeminjamanKhusus;
use Illuminate\Support\Facades\Auth;

class PeminjamanKhususController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form()
    {
        $biayaBungaKhusus = PersentaseBunga::where('nama', 'Bunga Konsumtif Khusus')->first();
        $biayaBungaBiasa = PersentaseBunga::where('nama', 'Bunga Konsumtif Biasa')->first();
        $biayaAdmin = PersentaseAdmin::first();
        $title = 'FORMULIR PERMOHONAN PINJAMAN KONSUMTIF KHUSUS';

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
        $title = 'DAFTAR PINJAMAN KONSUMTIF KHUSUS';
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
            'email' => ['required', 'email:dns', 'unique:users'],
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
            'ttd' => 'required|file|image',
            // penambahan rule untuk ttd dan up_ket
            'up_ket' => 'required|file|image',
        ], $messages);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        $amount = str_replace(",", "", $request->jumlah); // menghapus tanda koma

        $biayaBungaBiasa = PersentaseBunga::where('nama', 'Bunga Konsumtif Khusus')->first(); //untuk input id persentase_bunga

        $biayaAdmin = PersentaseAdmin::first();

        $loan = PeminjamanKhusus::create([
            'user_id' => $request->user_id,
            'biayaBunga_id' => $biayaBungaBiasa->id,
            'biayaAdmin_id' => $biayaAdmin->id,
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
            'amount_per_month' => ($amount + (($amount * $biayaBungaBiasa->nilai) / 100) + (($amount * $biayaAdmin->nilai) / 100)) / $request->duration,
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

        return redirect()->route('dashboard_anggota', $loan)->with('success', 'Pengajuan Pinjaman berhasil! Silahkan tunggu verifikasi.');
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

    public function verify(PeminjamanKhusus $loan)
    {
        $loan->update([
            'status' => 'Disetujui',
            'repayment_date' => now()->addMonths($loan->duration)
        ]);
        return redirect()->route('pinjamanan.khusus.index')->with('success', 'Pengajuan Pinjaman berhasil disetujui');
    }
}
