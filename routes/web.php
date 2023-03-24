<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::get('/anggota', function () {
    return view('anggota', [
        'title' => 'Data Anggota'
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('anggota/profile', function () {
    return view('profile', [
        'title' => 'Profile Anggota'
    ]);
});

Route::get('/register', function () {
    return view('index', [
        'title' => ''
    ]);
});
