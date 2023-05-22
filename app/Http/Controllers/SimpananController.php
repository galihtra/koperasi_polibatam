<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SimpananController extends Controller
{
    public function index(Request $request)
    {
        if (Gate::any(['admin', 'bendahara'])) {
            // $this->authorize('admin');

            // Menampilkan semua data simpanan anggota koperasi dengan fitur pencarian dan filter
            $search = $request->query('search');
            $jenis_simpanan = $request->query('jenis_simpanan');

            $simpanan = Simpanan::with('user')
                ->when($search, function ($query, $search) {
                    return $query->whereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    })
                        ->orWhereHas('user', function ($query) use ($search) {
                                $query->where('no_anggota', 'LIKE', '%' . $search . '%');
                            });
                })
                ->when($jenis_simpanan, function ($query, $jenis_simpanan) {
                    return $query->where('jenis_simpanan', $jenis_simpanan);
                })
                ->paginate(4);

            $title = 'Simpanan';
            return view('simpanan.index', compact('simpanan', 'title', 'jenis_simpanan', 'search'));
        }
    }


    public function create()
    {
        if (Gate::any(['admin', 'bendahara'])) {
            // $this->authorize('admin');
            // Menampilkan form untuk menambah simpanan anggota koperasi
            $users = User::all();
            $title = 'Tambah Simpanan';
            return view('simpanan.create', compact('users', 'title'));
        }
    }

    public function store(Request $request)
    {
        if (Gate::any(['admin', 'bendahara'])) {
            // $this->authorize('admin');
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

    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit data simpanan anggota koperasi
        $simpanan = Simpanan::findOrFail($id);
        $users = User::all();
        $title = 'Edit Simpanan';
        return view('simpanan.edit', compact('simpanan', 'users', 'title'));
    }

    public function update(Request $request, $id)
    {
        if (Gate::any(['admin', 'bendahara'])) {
            // $this->authorize('admin');
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
    }

    public function destroy($id)
    {
        if (Gate::any(['admin', 'bendahara'])) {
            // $this->authorize('admin');
            // Menghapus data simpanan
            $simpanan = Simpanan::findOrFail($id);
            $simpanan->delete();
            return redirect()->route('simpanan.index')->with('success', 'Simpanan anggota berhasil dihapus.');
        }
    }

    public function detail($id)
    {
        $anggota = User::with('simpanan')->find($id);
        $total_simpanan_perbulan = [];
        $tahun = request('tahun');

        if (!$anggota) {
            abort(404);
        }

        $total_simpanan_januari = 0;
        $total_simpanan_februari = 0;
        $total_simpanan_maret = 0;
        $total_simpanan_april = 0;
        $total_simpanan_mei = 0;
        $total_simpanan_juni = 0;
        $total_simpanan_juli = 0;
        $total_simpanan_agustus = 0;
        $total_simpanan_september = 0;
        $total_simpanan_oktober = 0;
        $total_simpanan_november = 0;
        $total_simpanan_desember = 0;

        foreach ($anggota->simpanan as $s) {
            if ($s->jenis_simpanan == 'Simpanan Pokok') {
                $besaran_simpanan = 1000000;
            } elseif ($s->jenis_simpanan == 'Simpanan Wajib') {
                $besaran_simpanan = 500000;
            } else {
                $besaran_simpanan = $s->jumlah;
            }

            $bulan = date('n', strtotime($s->tanggal));
            $tahun_simpanan = date('Y', strtotime($s->tanggal));
            if (!$tahun || $tahun_simpanan == $tahun) {
                switch ($bulan) {
                    case 1:
                        $total_simpanan_januari += $besaran_simpanan;
                        break;
                    case 2:
                        $total_simpanan_februari += $besaran_simpanan;
                        break;
                    case 3:
                        $total_simpanan_maret += $besaran_simpanan;
                        break;
                    case 4:
                        $total_simpanan_april += $besaran_simpanan;
                        break;
                    case 5:
                        $total_simpanan_mei += $besaran_simpanan;
                        break;
                    case 6:
                        $total_simpanan_juni += $besaran_simpanan;
                        break;
                    case 7:
                        $total_simpanan_juli += $besaran_simpanan;
                        break;
                    case 8:
                        $total_simpanan_agustus += $besaran_simpanan;
                        break;
                    case 9:
                        $total_simpanan_september += $besaran_simpanan;
                        break;
                    case 10:
                        $total_simpanan_oktober += $besaran_simpanan;
                        break;
                    case 11:
                        $total_simpanan_november += $besaran_simpanan;
                        break;
                    case 12:
                        $total_simpanan_desember += $besaran_simpanan;
                        break;
                }
            }
        }
        $total_simpanan_perbulan[$anggota->id]['nama'] = $anggota->name;
        $total_simpanan_perbulan[$anggota->id]['no_anggota'] = $anggota->no_anggota;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_januari'] = $total_simpanan_januari;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_februari'] = $total_simpanan_februari;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_maret'] = $total_simpanan_maret;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_april'] = $total_simpanan_april;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_mei'] = $total_simpanan_mei;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_juni'] = $total_simpanan_juni;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_juli'] = $total_simpanan_juli;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_agustus'] = $total_simpanan_agustus;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_september'] = $total_simpanan_september;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_oktober'] = $total_simpanan_oktober;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_november'] = $total_simpanan_november;
        $total_simpanan_perbulan[$anggota->id]['total_simpanan_desember'] = $total_simpanan_desember;

        $title = 'Detail Simpanan';
        return view('simpanan.detail', compact('total_simpanan_perbulan', 'title', 'id', 'tahun'));
    }




}