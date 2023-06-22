<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use App\Models\PersentaseBunga;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin', 'ketua'])) {

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
                'search' => $search,
            ]);
        // }
    }

    public function candidate()
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin', 'ketua'])) {

            $users = User::where('is_approved', false)->paginate(4);

            return view('users_candidate', [
                'title' => 'Calon Anggota Koperasi',
                'users' => $users
            ]);
        // }
    }


    public function show(User $user)
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin', 'ketua'])) {

            $editNoAnggota = false;

            if (request()->has('edit-no-anggota') && request()->input('edit-no-anggota')) {
                $editNoAnggota = true;
            }

            return view('show_user', [
                'title' => 'Data Anggota',
                'user' => $user,
                'editNoAnggota' => $editNoAnggota,
            ]);
        // }
    }

    public function detail(User $user)
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin', 'ketua'])) {

            $roles = RoleUser::all();
            $editNoAnggota = false;

            if (request()->has('edit-no-anggota') && request()->input('edit-no-anggota')) {
                $editNoAnggota = true;
            }

            return view('detail_user', [
                'title' => 'Data Anggota',
                'user' => $user,
                'editNoAnggota' => $editNoAnggota,
                'roles' => $roles
            ]);
        // }
    }

    public function updateNoAnggota(User $user)
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin', 'ketua'])) {

            // Ambil nomor anggota terakhir dan increment
            $lastUser = User::whereNotNull('no_anggota')->orderBy('no_anggota', 'desc')->first();
            if ($lastUser) {
                $lastNoAnggota = $lastUser->no_anggota;
                $lastSequenceNumber = intval(substr($lastNoAnggota, -3)); // Ambil 3 digit terakhir
                $newSequenceNumber = str_pad($lastSequenceNumber + 1, 3, '0', STR_PAD_LEFT); // Tambahkan 1 dan pad dengan 0 jika perlu
            } else {
                $newSequenceNumber = '001'; // Jika belum ada anggota, mulai dari 001
            }
            $newNoAnggota = 'KPB-001-' . $newSequenceNumber;

            $user->no_anggota = $newNoAnggota;
            $user->is_approved = true;
            $user->save();

            return redirect()->route('users.candidate', $user)->with('success', 'User berhasil disetujui');
        // }
    }
    
    public function updateStatusAnggota(Request $request, User $user)
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin', 'ketua'])) {


            $validatedData = request()->validate([
                'stat_akun' => 'required|string',
            ]);

            $user->stat_akun = $validatedData['stat_akun'];
            $user->id_roles = $request->input('id_roles');
            $user->is_approved = true;
            $user->save();

            return redirect()->route('users.index', $user)->with('success', 'Status ' . $user->name . ' berhasil diubah');
        // }

    }

    public function destroy(User $user)
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin', 'ketua'])) {

            $user->delete();
            return redirect()->route('users.candidate')->with('success', 'User berhasil dihapus');
        // }
    }

    // Untuk Dashboard
    public function dashboard()
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan. gate bisa dicek di file AppServiceProvider.php
        // if (Gate::any(['admin','ketua','pengawas'])) {

            $totalBendahara = User::where('id_roles', 4)->count();
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
                'title' => 'Beranda Admin',
                'stats' => $stats,
                'totalBendahara' => $totalBendahara,
                'pokokTotal' => $pokokTotal,
                'wajibTotal' => $wajibTotal,
                'sukarelaTotal' => $sukarelaTotal,
                'labels' => $labels,
                'values' => $values,
                'anggota_aktif' => $anggota_aktif,
                'anggota_tidak_aktif' => $anggota_tidak_aktif,
            ]);
        // }
    }

    public function getTotalSimpanan()
    {
        $total_simpanan = User::getTotalSimpanan();
        return view('users', compact('total_simpanan'));
    }



}