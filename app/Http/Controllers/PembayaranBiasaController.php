<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanBiasa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class PembayaranBiasaController extends Controller
{
    //
    public function index(Request $request)
    {
        if (Gate::any(['admin', 'bendahara'])) {

            $query = PeminjamanBiasa::query();

            // Filter berdasarkan status pinjaman
            if ($request->has('status_pinjaman') && $request->status_pinjaman != '') {
                $query->where('status_pinjaman', $request->status_pinjaman);
            }

            // Filter berdasarkan nama peminjam
            if ($request->has('nama') && $request->nama != '') {
                $query->join('users', 'peminjaman_biasa.user_id', '=', 'users.id')
                    ->where('users.name', 'like', '%' . $request->nama . '%');
            }

            // Urutkan berdasarkan status pinjaman dan sisa pinjaman
            $loans = $query->orderBy('status_pinjaman', 'asc')
                ->orderBy('remaining_amount', 'desc')
                ->paginate(5);

            $title = 'Daftar Mutasi Pinjaman Konsumtif Biasa';
            return view('pembayaran.biasa.index', compact('loans', 'title'));
        }
    }


    public function create($id)
    {
        if (Gate::any(['admin', 'bendahara'])) {
            $loan = PeminjamanBiasa::find($id);
            $title = 'Pembayaran Pinjaman';
            return view('pembayaran.biasa.create', compact('loan', 'title'));
        }
    }

    public function store(Request $request)
    {
        if (Gate::any(['admin', 'bendahara'])) {
            $loan = PeminjamanBiasa::find($request->peminjaman_id);
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

            $namaPeminjam = $loan->user->nama;
            $pesan = "Pembayaran atas nama $namaPeminjam telah berhasil.";

            return redirect()->route('pembayaran.biasa.index')->with('success', $pesan);
        }
    }
}
