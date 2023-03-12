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
        $users = User::where('is_approved', false)->get();
        return view('users', [
            'title' => 'Anggota',
            'users' => $users
        ]);
    }

    public function approve(User $user)
    {
        $user->is_approved = true;
        $user->save();
        return redirect()->route('users.index')->with('success', 'User approved successfully');
    }

}