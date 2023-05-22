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
        return view('profile', [
            'title' => 'Data Anggota',
            'user' => auth()->user() // Pass the current user to the view
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