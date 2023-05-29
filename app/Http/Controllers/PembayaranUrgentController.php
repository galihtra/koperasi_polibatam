<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanUrgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranUrgentController extends Controller
{
    //
    public function index()
    {
        $loans = PeminjamanUrgent::all();
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
        // Validate the request data
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman_urgent,id',
            'months' => 'required|array',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Update the remaining loan amount
            $loan = PeminjamanUrgent::find($request->peminjaman_id);
            $loan->amount -= array_sum($request->months); // asumsikan bahwa 'amount' adalah jumlah pinjaman yang tersisa
            $loan->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('pembayaran.urgent.index')->with('success', 'Pembayaran berhasil disimpan.');
        } catch (\Exception $e) {
            // An error occurred; cancel the transaction...
            DB::rollback();

            // and return to the previous form with errors
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan. Pembayaran tidak dapat disimpan.']);
        }
    }



}