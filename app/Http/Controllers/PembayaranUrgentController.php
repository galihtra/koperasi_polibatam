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
        $loan = PeminjamanUrgent::find($request->peminjaman_id);
        $paid_months = json_decode($loan->paid_months, true);

        $payment_month = count($paid_months) + 1; // get the next month to be paid
        $paid_months[] = $payment_month; // record the month that has been paid

        $loan->remaining_amount -= $loan->amount_per_month; // decrease the remaining amount
        $loan->paid_months = json_encode($paid_months); // update the paid_months array

        $loan->save();

        return redirect()->route('pembayaran.urgent.index');
    }





}