<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CicilanPinjaman;
use App\Models\PeminjamanUrgent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PembayaranUrgentController extends Controller
{
    public function index(Request $request)
    {
        // if (Gate::any(['admin', 'bendahara'])) {
            $query = PeminjamanUrgent::query();

            // Filter berdasarkan status pinjaman
            if ($request->has('status_pinjaman') && $request->status_pinjaman !== '' && $request->status_pinjaman !== null) {
                $query->where('status_pinjaman', $request->status_pinjaman);
            }

            // Filter berdasarkan nama peminjam
            if ($request->has('nama') && $request->nama !== '') {
                $query->where('nama', 'like', '%' . $request->nama . '%');
            }

            // Filter data yang sudah disetujui
            $query->where('status', 'Disetujui');

            // Urutkan berdasarkan status pinjaman dan sisa pinjaman
            $loans = $query->orderBy('status_pinjaman', 'asc')
                ->orderBy('remaining_amount', 'desc')
                ->paginate(5);

            $title = 'Daftar Cicilan Pinjaman Mendesak';
            return view('pembayaran.urgent.index', compact('loans', 'title'));
        // }
    }

    public function MutasiUser(Request $request)
    {
        $userId = auth()->id();

        $query = PeminjamanUrgent::query()->where('user_id', $userId);

        // Filter berdasarkan status pinjaman
        if ($request->has('status_pinjaman') && $request->status_pinjaman !== '' && $request->status_pinjaman !== null) {
            $query->where('status_pinjaman', $request->status_pinjaman);
        }

        // Filter data yang sudah disetujui
        $query->where('status', 'Disetujui');

        // Urutkan berdasarkan status pinjaman dan sisa pinjaman
        $loans = $query->orderBy('status_pinjaman', 'asc')
            ->orderBy('remaining_amount', 'desc')
            ->paginate(5);

        $title = 'Daftar Mutasi Pinjaman Mendesak';
        return view('pembayaran.urgent.mutasi', compact('loans', 'title'));
        
    }

    public function create($id)
    {
        $loan = PeminjamanUrgent::find($id);
        $months = [];
        $title = 'Pembayaran Pinjaman';
        return view('pembayaran.urgent.create', compact('loan', 'months', 'title'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pinjamanUrgent' => 'required|exists:peminjaman_urgent,id',
            'tgl_bayar' => 'required|date',
        ]);

        $pinjaman = PeminjamanUrgent::find($request->id_pinjamanUrgent);

        $cicilan = new CicilanPinjaman();
        $cicilan->id_pinjamanUrgent = $request->id_pinjamanUrgent;
        $cicilan->tgl_bayar = $request->tgl_bayar;
        $cicilan->jumlah_bayar = $pinjaman->amount_per_month;
        $cicilan->status = 'Sudah Dibayar';
        $cicilan->save();

        $pinjaman->remaining_amount -= $pinjaman->amount_per_month;
        $pinjaman->total_paid_per_month += $pinjaman->amount_per_month;

        if ($pinjaman->remaining_amount <= 0) {
            $pinjaman->status_pinjaman = 'Sudah Lunas';
        }

        $pinjaman->save();

        $riwayatCicilan = CicilanPinjaman::where('id_pinjamanUrgent', $request->id_pinjamanUrgent)->get();

        return redirect()->back()->with('success', 'Cicilan pinjaman berhasil dicatat.')->with('riwayatCicilan', $riwayatCicilan);
    }


}