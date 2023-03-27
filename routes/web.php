<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\File;

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



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/', function () {
//     return view('dashboard', [
//         'title' => 'Dashboard'
//     ]);
// })->middleware('auth');




Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users_candidate', [UserController::class, 'candidate'])->name('users.candidate');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{user}/update-no-anggota', [UserController::class, 'updateNoAnggota'])->name('users.update-no-anggota');


Route::post('/lihat', function () {
    session(['tombol_status' => 'dilihat']);
    return response()->json(['message' => 'Tombol telah dilihat.']);
});

Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/',[DashboardController::class, 'index'])->middleware('auth')->name('dashboard_anggota');


Route::get('/simpanan', [SimpananController::class, 'index'])->name('simpanan.index');
Route::get('/simpanan/create', [SimpananController::class, 'create'])->name('simpanan.create');
Route::post('/simpanan', [SimpananController::class, 'store'])->name('simpanan.store');
Route::get('/simpanan/{id}/edit', [SimpananController::class, 'edit'])->name('simpanan.edit');
Route::put('/simpanan/{id}', [SimpananController::class, 'update'])->name('simpanan.update');
Route::delete('/simpanan/{id}', [SimpananController::class, 'destroy'])->name('simpanan.destroy');
Route::get('/simpanan/detail', [SimpananController::class, 'detail'])->name('simpanan.detail');





// Route::get('/register2', function () {
//     return view('register.index2',[
//         'title' => 'FORMULIR PERMOHONAN KEANGGOTAAN'
//     ]);
// });






// Route::get('/anggota', function () {
//     return view('anggota',[
//         'title' => 'Data Anggota'
//     ]);
// })->middleware('auth');