<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        // $users = User::all();
        $users = User::where('is_approved', true)->get();
        return view('users', [
            'title' => 'Anggota',
            'users' => $users
        ]);
    }


    public function approve(User $user)
    {
        $user->is_approved = true;
        $user->save();
        return redirect()->route('users.candidate')->with('success', 'User approved successfully');
    }

    public function candidate()
    {
        $this->authorize('admin');
        // $users = User::all();
        $users = User::where('is_approved', false)->get();
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

    public function updateNoAnggota(User $user)
    {
        $this->authorize('admin');

        $validatedData = request()->validate([
            'no_anggota' => 'required|string',
        ]);

        $user->no_anggota = $validatedData['no_anggota'];
        $user->save();

        return redirect()->route('users.candidate', $user)->with('success', 'No. Anggota added successfully for ' . $user->name);
    }

    public function destroy(User $user)
    {
        $this->authorize('admin');
        $user->delete();
        return redirect()->route('users.candidate')->with('success', 'User deleted successfully');
    }

    // Untuk Dashboard
    public function dashboard()
    {
        // Anda dapat menggantikan 'admin' dengan gate yang Anda gunakan
        $this->authorize('admin');

        $totalAdmins = User::where('admin', true)->count();
        $maleCount = User::where('gender', 'laki-laki')->count();
        $femaleCount = User::where('gender', 'perempuan')->count();

        $stats = [
            'laki_laki' => $maleCount,
            'perempuan' => $femaleCount
        ];

        return view('dashboard', [
            'title' => 'Dashboard',
            'stats' => $stats,
            'totalAdmins' => $totalAdmins
        ]);
    }


}