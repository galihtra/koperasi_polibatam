<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
// Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/detail/{user}', [UserController::class, 'detail'])->name('users.detail');
Route::put('/users/{user}/update-status-anggota', [UserController::class, 'updateStatusAnggota'])->name('users.update-status-anggota');
Route::put('/users/{user}/update-no-anggota', [UserController::class, 'updateNoAnggota'])->name('users.update-no-anggota');

// Lupa password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
 
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::post('/lihat', function () {
    session(['tombol_status' => 'dilihat']);
    return response()->json(['message' => 'Tombol telah dilihat.']);
});

// Dashboard
Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard_anggota');


Route::get('/simpanan', [SimpananController::class, 'index'])->name('simpanan.index');
Route::get('/simpanan/create', [SimpananController::class, 'create'])->name('simpanan.create');
Route::post('/simpanan', [SimpananController::class, 'store'])->name('simpanan.store');
Route::get('/simpanan/{id}/edit', [SimpananController::class, 'edit'])->name('simpanan.edit');
Route::put('/simpanan/{id}', [SimpananController::class, 'update'])->name('simpanan.update');
Route::delete('/simpanan/{id}', [SimpananController::class, 'destroy'])->name('simpanan.destroy');
Route::get('/simpanan/{id}/detail', [SimpananController::class, 'detail'])->name('simpanan.detail');






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