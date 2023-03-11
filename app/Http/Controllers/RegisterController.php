<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    //  digunakan untuk menyimpan data ke basis data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','min:6','max:255'],
        ]);

        // cara enkripsi dengan bcyrpt
        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull!, please login');

        return redirect('/login')->with('success', 'Registration successfull!, Please login');

    }


}
