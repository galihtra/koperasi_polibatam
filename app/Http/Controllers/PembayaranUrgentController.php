<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanUrgent;
use Illuminate\Http\Request;

class PembayaranUrgentController extends Controller
{
    //
    public function index()
    {
        $loans = PeminjamanUrgent::all();
        $title = 'Daftar Peminjaman';
        return view('pembayaran.urgent.index', compact('loans', 'title'));
    }
}