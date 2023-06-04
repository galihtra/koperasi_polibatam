<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanUrgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranUrgentController extends Controller
{
    //
    public function index(Request $request)
    {
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

        $title = 'Daftar Peminjaman';
        return view('pembayaran.urgent.index', compact('loans', 'title'));
    }




    public function create($id)
    {
        $loan = PeminjamanUrgent::find($id);
        $title = 'Pembayaran Pinjaman';
        return view('pembayaran.urgent.create', compact('loan', 'title'));
    }

    public function store(Request $request)
    {
        $loan = PeminjamanUrgent::find($request->peminjaman_id);
        $paid_months = json_decode($loan->paid_months, true);

        $payment_month = count($paid_months) + 1; // get the next month to be paid
        $paid_months[] = $payment_month; // record the month that has been paid

        $loan->remaining_amount -= $loan->amount_per_month; // decrease the remaining amount
        $loan->paid_months = json_encode($paid_months); // update the paid_months array

        $loan->save();

        // Update status to "Lunas" if remaining amount is 0
        if ($loan->remaining_amount == 0) {
            $loan->status_pinjaman = 'Sudah Lunas';
            $loan->save();
        }

        $namaPeminjam = $loan->nama;
        $pesan = "Pembayaran atas nama $namaPeminjam telah berhasil.";

        return redirect()->route('pembayaran.urgent.index')->with('success', $pesan);
    }
}