<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersentaseBunga;
use Illuminate\Support\Facades\Gate;

class PersentaseBungaController extends Controller
{
    public function index()
    {
        if (Gate::any(['admin', 'bendahara'])) {
            $bungas = PersentaseBunga::all();
            $title = 'BIAYA BUNGA PINJAMAN';
            return view('biayaBunga.index', compact('bungas', 'title'));
        }
    }

    public function update(Request $request, PersentaseBunga $bunga)
    {
        if (Gate::any(['admin', 'bendahara'])) {

            $request->validate([
                'nilai' => 'required|numeric',
            ]);

            $bunga->nilai = $request->input('nilai');
            $bunga->save();

            return redirect()->route('persentase.bunga.index')->with('success', 'Data bunga berhasil diperbarui.');
        }

    }


}
