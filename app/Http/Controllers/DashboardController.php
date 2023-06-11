<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBiasa;
use App\Models\Simpanan;
use App\Models\PeminjamanUrgent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        $pokokTotal = Simpanan::where('jenis_simpanan', 'pokok')
            ->where('user_id', $userId)
            ->sum('jumlah');

        $wajibTotal = Simpanan::where('jenis_simpanan', 'wajib')
            ->where('user_id', $userId)
            ->sum('jumlah');

        $sukarelaTotal = Simpanan::where('jenis_simpanan', 'sukarela')
            ->where('user_id', $userId)
            ->sum('jumlah');

        $dataPokok = DB::table('simpanans')
            ->select(DB::raw("DATE_FORMAT(tanggal, '%M %Y') as month_year"), DB::raw('SUM(jumlah) as total'))
            ->where('user_id', $userId)
            ->where('jenis_simpanan', 'pokok')
            ->groupBy('month_year')
            ->get();

        $dataWajib = DB::table('simpanans')
            ->select(DB::raw("DATE_FORMAT(tanggal, '%M %Y') as month_year"), DB::raw('SUM(jumlah) as total'))
            ->where('user_id', $userId)
            ->where('jenis_simpanan', 'wajib')
            ->groupBy('month_year')
            ->get();

        $dataSukarela = DB::table('simpanans')
            ->select(DB::raw("DATE_FORMAT(tanggal, '%M %Y') as month_year"), DB::raw('SUM(jumlah) as total'))
            ->where('user_id', $userId)
            ->where('jenis_simpanan', 'sukarela')
            ->groupBy('month_year')
            ->get();

        $labelsPokok = $dataPokok->pluck('month_year');
        $valuesPokok = $dataPokok->pluck('total');

        $labelsWajib = $dataWajib->pluck('month_year');
        $valuesWajib = $dataWajib->pluck('total');

        $labelsSukarela = $dataSukarela->pluck('month_year');
        $valuesSukarela = $dataSukarela->pluck('total');

        $pinjamanUrgent = PeminjamanUrgent::where('user_id', $userId)
            ->orderBy('status_pinjaman', 'asc')
            ->orderBy('remaining_amount', 'desc')
            ->get();

        $pinjamanBiasa = PeminjamanBiasa::where('user_id', $userId)
            ->orderBy('status_pinjaman', 'asc')
            ->orderBy('remaining_amount', 'desc')
            ->get();

        return view('dashboard_anggota')->with([
            'title' => 'Beranda Saya',
            'pokokTotal' => $pokokTotal,
            'wajibTotal' => $wajibTotal,
            'sukarelaTotal' => $sukarelaTotal,
            'labelsPokok' => $labelsPokok,
            'valuesPokok' => $valuesPokok,
            'labelsWajib' => $labelsWajib,
            'valuesWajib' => $valuesWajib,
            'labelsSukarela' => $labelsSukarela,
            'valuesSukarela' => $valuesSukarela,
            'pinjamanUrgent' => $pinjamanUrgent,
            'pinjamanBiasa' => $pinjamanBiasa,
        ]);
    }


}