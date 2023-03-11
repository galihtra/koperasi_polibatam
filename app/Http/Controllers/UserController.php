<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $users = User::all();
        return view('users', [
            'title' => 'Anggota',
            'users' => $users
        ]);
    }
}