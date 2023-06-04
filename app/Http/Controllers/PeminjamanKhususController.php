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
        $loan->alasan_pinjam = $request->alasan_pinjam;
        $loan->amount = $amount + (($amount * $biayaBungaBiasa->nilai) / 100) + (($amount * $biayaAdmin->nilai) / 100);
        $loan->remaining_amount = $loan->amount; // Set remaining_amount equal to amount here
        $loan->amount_per_month = ($amount + (($amount * $biayaBungaBiasa->nilai) / 100) + (($amount * $biayaAdmin->nilai) / 100)) / $request->duration;
        $loan->duration = $request->duration;
        $loan->status = 'Menunggu';

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

    public function verify(PeminjamanKhusus $loan)
    {
        $loan->update([
            'status' => 'Disetujui',
            'repayment_date' => now()->addMonths($loan->duration)
        ]);

        // Kirim email pemberitahuan
        $emailData = [
            'amount' => $loan->amount,
            'no_rek_bni' => $loan->user->no_rek_bni,
            'amount_per_month' => $loan->amount_per_month,
            'duration' => $loan->duration,
            'nama' => $loan->user->nama,
        ];
        Mail::to($loan->email)->send(new PeminjamanKhususNotification($emailData));
        
        return redirect()->route('pinjamanan.biasa.index')->with('success', 'Pengajuan Pinjaman berhasil disetujui');
    }
}
