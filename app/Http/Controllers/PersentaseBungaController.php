<?php

namespace App\Http\Controllers;

use App\Models\PersentaseBunga;
use Illuminate\Http\Request;

class PersentaseBungaController extends Controller
{
    public function index()
    {
        $bungas = PersentaseBunga::all();
        $title = 'BIAYA BUNGA PINJAMAN';
        return view('biayaBunga.index', compact('bungas', 'title'));
    }

    public function update(Request $request, PersentaseBunga $bunga)
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        $this->authorize('admin');

        $request->validate([
            'nilai' => 'required|numeric',
        ]);

        $bunga->nilai = $request->input('nilai');
        $bunga->save();

        return redirect()->route('persentase.bunga.index')->with('success', 'Data bunga berhasil diperbarui.');

    }


}
