<?php


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PembayaranUrgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanBiasaController;
use App\Http\Controllers\PeminjamanKhususController;
use App\Http\Controllers\PeminjamanUrgentController;


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
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard_anggota');

// Simpanan
Route::get('/simpanan', [SimpananController::class, 'index'])->name('simpanan.index');
Route::get('/simpanan/create', [SimpananController::class, 'create'])->name('simpanan.create');
Route::post('/simpanan', [SimpananController::class, 'store'])->name('simpanan.store');
Route::get('/simpanan/{id}/edit', [SimpananController::class, 'edit'])->name('simpanan.edit');
Route::put('/simpanan/{id}', [SimpananController::class, 'update'])->name('simpanan.update');
Route::delete('/simpanan/{id}', [SimpananController::class, 'destroy'])->name('simpanan.destroy');
Route::get('/simpanan/{id}/detail', [SimpananController::class, 'detail'])->name('simpanan.detail');

// Peminjaman Urgent 
Route::get('/pengajuan-peminjaman-urgent', [PeminjamanUrgentController::class, 'form'])->name('form.pinjaman.urgent');
Route::get('/peminjaman-urgent-index', [PeminjamanUrgentController::class, 'index'])->name('pinjamanan.urgent.index');
Route::get('/peminjaman-urgent/create', [PeminjamanUrgentController::class, 'create']);
Route::post('/peminjaman-urgent', [PeminjamanUrgentController::class, 'store'])->name('pinjaman.urgent.store');
Route::get('/peminjaman-urgent/{loan}', [PeminjamanUrgentController::class, 'show'])->name('pinjaman.urgent.show');
Route::get('/peminjaman-urgent/detail/{loan}', [PeminjamanUrgentController::class, 'detail'])->name('pinjaman.urgent.detail');
Route::patch('/peminjaman-konsumtif-urgent/{loan}/verifyKetua', [PeminjamanUrgentController::class, 'verifyKetua'])->name('pinjaman.urgent.verifyKetua');
Route::patch('/peminjaman-konsumtif-urgent/{loan}/verifyBendahara', [PeminjamanUrgentController::class, 'verifyBendahara'])->name('pinjaman.urgent.verifyBendahara');
Route::patch('/peminjaman-konsumtif-urgent/{loan}/reject', [PeminjamanUrgentController::class, 'reject'])->name('pinjaman.urgent.reject');


// Peminjaman Konsumtif Biasa
Route::get('/pengajuan-peminjaman-konsumtif-biasa', [PeminjamanBiasaController::class, 'form'])->name('form.pinjaman.biasa');
Route::get('/peminjaman-konsumtif-biasa-index', [PeminjamanBiasaController::class, 'index'])->name('pinjamanan.biasa.index');
Route::get('/peminjaman-konsumtif-biasa/create', [PeminjamanBiasaController::class, 'create']);
Route::post('/peminjaman-konsumtif-biasa', [PeminjamanBiasaController::class, 'store'])->name('pinjaman.biasa.store');
Route::get('/peminjaman-konsumtif-biasa/{loan}', [PeminjamanBiasaController::class, 'show'])->name('pinjaman.biasa.show');
Route::get('/peminjaman-konsumtif-biasa/detail/{loan}', [PeminjamanBiasaController::class, 'detail'])->name('pinjaman.biasa.detail');
Route::patch('/peminjaman-konsumtif-biasa/{loan}/verify', [PeminjamanBiasaController::class, 'verify'])->name('pinjaman.biasa.verify');

// Peminjaman Konsumtif Khusus
Route::get('/pengajuan-peminjaman-konsumtif-khusus', [PeminjamanKhususController::class, 'form'])->name('form.pinjaman.khusus');
Route::get('/peminjaman-konsumtif-khusus-index', [PeminjamanKhususController::class, 'index'])->name('pinjamanan.khusus.index');
Route::get('/peminjaman-konsumtif-khusus/create', [PeminjamanKhususController::class, 'create']);
Route::post('/peminjaman-konsumtif-khusus', [PeminjamanKhususController::class, 'store'])->name('pinjaman.khusus.store');
Route::get('/peminjaman-konsumtif-khusus/{loan}', [PeminjamanKhususController::class, 'show'])->name('pinjaman.khusus.show');
Route::get('/peminjaman-konsumtif-khusus/detail/{loan}', [PeminjamanKhususController::class, 'detail'])->name('pinjaman.khusus.detail');



// Pembayaran Urgent
Route::get('/pembayaran-urgent-index', [PembayaranUrgentController::class, 'index'])->name('pembayaran.urgent.index');
Route::get('/pembayaran-urgent-create/{id}', [PembayaranUrgentController::class, 'create'])->name('pembayaran.urgent.create');
Route::post('/pembayaran-urgent-store', [PembayaranUrgentController::class, 'store'])->name('pembayaran.urgent.store');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');