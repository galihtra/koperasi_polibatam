<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        // Menampilkan semua data simpanan anggota koperasi
        $simpanan = Simpanan::with('user')->paginate(4);
        $title = 'Simpanan';
        return view('simpanan.index', compact('simpanan', 'title'));
    }

    public function create()
    {
        $this->authorize('admin');
        // Menampilkan form untuk menambah simpanan anggota koperasi
        $users = User::all();
        $title = 'Tambah Simpanan';
        return view('simpanan.create', compact('users','title'));
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        // Menyimpan data simpanan anggota koperasi yang baru
        $request->validate([
            'user_id' => 'required',
            'jenis_simpanan' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'nullable',
        ]);
        Simpanan::create($request->all());
        return redirect()->route('simpanan.index')->with('success', 'Simpanan anggota berhasil ditambahkan.');

    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit data simpanan anggota koperasi
        $simpanan = Simpanan::findOrFail($id);
        $users = User::all();
        $title = 'Edit Simpanan';
        return view('simpanan.edit', compact('simpanan', 'users','title'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        // Memperbarui data simpanan anggota koperasi
        $request->validate([
            'user_id' => 'required',
            'jenis_simpanan' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'nullable',
        ]);

        $simpanan = Simpanan::findOrFail($id);
        $simpanan->update($request->all());
        return redirect()->route('simpanan.index')->with('success', 'Simpanan anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        // Menghapus data simpanan
        $simpanan = Simpanan::findOrFail($id);
        $simpanan->delete();
        return redirect()->route('simpanan.index')->with('success', 'Simpanan anggota berhasil dihapus.');
    }

}