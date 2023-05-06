<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');

        $search = $request->input('search');

        $users = User::where('is_approved', true)
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('no_anggota', 'LIKE', '%' . $search . '%');
                });
            })
            ->paginate(4);

        return view('users', [
            'title' => 'Daftar Anggota',
            'users' => $users,
            'search' => $search
        ]);
    }

    // public function approve(User $user)
    // {
    //     $user->is_approved = true;
    //     $user->save();
    //     return redirect()->route('users.candidate')->with('success', 'User berhasil disetujui');
    // }

    public function candidate()
    {
        $this->authorize('admin');
        $users = User::where('is_approved', false)->paginate(4);

        return view('users_candidate', [
            'title' => 'Calon Anggota',
            'users' => $users
        ]);
    }


    public function show(User $user)
    {
        $this->authorize('admin');

        $editNoAnggota = false;

        if (request()->has('edit-no-anggota') && request()->input('edit-no-anggota')) {
            $editNoAnggota = true;
        }

        return view('show_user', [
            'title' => 'Data Anggota',
            'user' => $user,
            'editNoAnggota' => $editNoAnggota,
        ]);
    }

    public function detail(User $user)
    {
        $this->authorize('admin');

        $editNoAnggota = false;

        if (request()->has('edit-no-anggota') && request()->input('edit-no-anggota')) {
            $editNoAnggota = true;
        }

        return view('detail_user', [
            'title' => 'Data Anggota',
            'user' => $user,
            'editNoAnggota' => $editNoAnggota,
        ]);
    }

    public function updateNoAnggota(User $user)
    {
        $this->authorize('admin');

        $validatedData = request()->validate([
            'no_anggota' => 'required|string',
        ]);
        
        $user->no_anggota = $validatedData['no_anggota'];
        // $user->stat_akun = $validatedData['stat_akun'];
        $user->is_approved = true;
        $user->save();

        return redirect()->route('users.candidate', $user)->with('success', 'User berhasil disetujui');
    }
    public function updateStatusAnggota(User $user)
    {
        $this->authorize('admin');

        $validatedData = request()->validate([
            'no_anggota' => 'required|string',
        ]);
        
        $user->stat_akun = $validatedData['stat_akun'];
        $user->is_approved = true;
        $user->save();

        return redirect()->route('users.index', $user)->with('success', 'Status anggota berhasil diubah');
    }

    public function destroy(User $user)
    {
        $this->authorize('admin');
        $user->delete();
        return redirect()->route('users.candidate')->with('success', 'User berhasil dihapus');
    }

    // Untuk Dashboard
    public function dashboard()
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan
        $this->authorize('admin');

        $totalAdmins = User::where('admin', true)->count();
        $maleCount = User::where('gender', 'laki-laki')->count();
        $femaleCount = User::where('gender', 'perempuan')->count();

        $pokokTotal = Simpanan::where('jenis_simpanan', 'pokok')->sum('jumlah');
        $wajibTotal = Simpanan::where('jenis_simpanan', 'wajib')->sum('jumlah');
        $sukarelaTotal = Simpanan::where('jenis_simpanan', 'sukarela')->sum('jumlah');

        $anggota_aktif = User::where('stat_akun', 'aktif')->count();
        $anggota_tidak_aktif = User::where('stat_akun', 'non-aktif')->count();

        $data = DB::table('simpanans')
            ->select(DB::raw("DATE_FORMAT(tanggal, '%M %Y') as month_year"), DB::raw('SUM(jumlah) as total'))
            ->groupBy('month_year')
            ->get();

        $labels = $data->pluck('month_year');
        $values = $data->pluck('total');

        $stats = [
            'laki_laki' => $maleCount,
            'perempuan' => $femaleCount
        ];

        return view('dashboard', [
            'title' => 'Dashboard',
            'stats' => $stats,
            'totalAdmins' => $totalAdmins,
            'pokokTotal' => $pokokTotal,
            'wajibTotal' => $wajibTotal,
            'sukarelaTotal' => $sukarelaTotal,
            'labels' => $labels,
            'values' => $values,
            'anggota_aktif' => $anggota_aktif,
            'anggota_tidak_aktif' => $anggota_tidak_aktif,
        ]);
    }

    public function getTotalSimpanan()
    {
        $total_simpanan = User::getTotalSimpanan();
        return view('users', compact('total_simpanan'));
    }



}