<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $is_bendahara = $user->is_bendahara; // Ubah is_bendahara sesuai dengan field yang sesuai dalam model User
        $is_pengawas = $user->is_pengawas; // Ubah is_pengawas sesuai dengan field yang sesuai dalam model User
        $is_ketua = $user->is_ketua; // Ubah is_ketua sesuai dengan field yang sesuai dalam model User
        $is_admin = $user->is_admin; // Ubah is_admin sesuai dengan field yang sesuai dalam model User
        $is_kabag = $user->is_kabag; // Ubah is_kabag sesuai dengan field yang sesuai dalam model User
        $is_sdm = $user->is_sdm; // Ubah is_kabag sesuai dengan field yang sesuai dalam model User

        return view('profile', [
            'title' => 'Data Anggota',
            'user' => $user,
            'is_bendahara' => $is_bendahara,
            'is_pengawas' => $is_pengawas,
            'is_ketua' => $is_ketua,
            'is_admin' => $is_admin,
            'is_kabag' => $is_kabag,
            'is_sdm' => $is_sdm,
        ]);
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        if (!($user instanceof User)) {
            // Handle the error, e.g. by redirecting back and showing a message
            return back()->withErrors('Could not retrieve user information.');
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'up_foto' => 'image|max:2048',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if ($request->file('up_foto')) {
            $user->up_foto = $request->file('up_foto')->store('post-images', 'public');
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}