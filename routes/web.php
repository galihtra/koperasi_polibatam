<?php


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranBiasaController;
use App\Http\Controllers\PeminjamanBiasaController;
use App\Http\Controllers\PersentaseBungaController;
use App\Http\Controllers\PembayaranKhususController;
use App\Http\Controllers\PembayaranUrgentController;
use App\Http\Controllers\PeminjamanKhususController;
use App\Http\Controllers\PeminjamanUrgentController;
use App\Http\Controllers\DependentDropdownController;
use App\Models\PersentaseBunga;

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



// Hanya bisa diakes oleh Ketua
Route::get('/users', [UserController::class, 'index'])->middleware(['auth', CheckRoles::class . ':1'])->name('users.index');
Route::get('/users_candidate', [UserController::class, 'candidate'])->middleware(['auth', CheckRoles::class . ':1'])->name('users.candidate');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(['auth', CheckRoles::class . ':1'])->name('users.destroy');
// Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
Route::get('/users/{user}', [UserController::class, 'show'])->middleware(['auth', CheckRoles::class . ':1'])->name('users.show');
Route::get('/users/detail/{user}', [UserController::class, 'detail'])->middleware(['auth', CheckRoles::class . ':1'])->name('users.detail');
Route::put('/users/{user}/update-status-anggota', [UserController::class, 'updateStatusAnggota'])->middleware(['auth', CheckRoles::class . ':1'])->name('users.update-status-anggota');
Route::put('/users/{user}/update-no-anggota', [UserController::class, 'updateNoAnggota'])->middleware(['auth', CheckRoles::class . ':1'])->name('users.update-no-anggota');

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

// Dashboard (Role 1 sebagai Ketua , Role 5 sebagai Pengawas)
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', CheckRoles::class . ':1,5'])->name('dashboard');

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard_anggota');


// Simpanan
// Hanya bisa diakses oleh Bendahara dan ada halaman yang bisa diakses ketua juga
Route::get('/simpanan', [SimpananController::class, 'index'])->middleware(['auth', CheckRoles::class . ':4'])->name('simpanan.index');
Route::get('/simpanan/create', [SimpananController::class, 'create'])->middleware(['auth', CheckRoles::class . ':4'])->name('simpanan.create');
Route::post('/simpanan', [SimpananController::class, 'store'])->middleware(['auth', CheckRoles::class . ':4'])->name('simpanan.store');
Route::get('/simpanan/{id}/edit', [SimpananController::class, 'edit'])->middleware(['auth', CheckRoles::class . ':4'])->name('simpanan.edit');
Route::put('/simpanan/{id}', [SimpananController::class, 'update'])->middleware(['auth', CheckRoles::class . ':4'])->name('simpanan.update');
Route::delete('/simpanan/{id}', [SimpananController::class, 'destroy'])->middleware(['auth', CheckRoles::class . ':4'])->name('simpanan.destroy');
Route::get('/simpanan/{id}/detail', [SimpananController::class, 'detail'])->middleware(['auth', CheckRoles::class . ':1,4'])->name('simpanan.detail');


// Peminjaman Urgent 
// Hanya bisa diakes oleh Ketua dan Bendahara
Route::middleware(['auth', CheckRoles::class . ':1,4'])->group(function () {
    Route::get('/peminjaman-urgent-index', [PeminjamanUrgentController::class, 'index'])->name('pinjamanan.urgent.index');
    Route::get('/peminjaman-urgent/{loan}', [PeminjamanUrgentController::class, 'show'])->name('pinjaman.urgent.show');
    Route::patch('/peminjaman-konsumtif-urgent/{loan}/reject', [PeminjamanUrgentController::class, 'reject'])->name('pinjaman.urgent.reject');
});
// Hanya bisa diakses oleh Ketua
Route::patch('/peminjaman-konsumtif-urgent/{loan}/verifyKetua', [PeminjamanUrgentController::class, 'verifyKetua'])->middleware(['auth', CheckRoles::class . ':1'])->name('pinjaman.urgent.verifyKetua');
// Hanya bisa diakes oleh Bendahara
Route::patch('/peminjaman-konsumtif-urgent/{loan}/verifyBendahara', [PeminjamanUrgentController::class, 'verifyBendahara'])->middleware(['auth', CheckRoles::class . ': 4'])->name('pinjaman.urgent.verifyBendahara');

Route::get('/pengajuan-peminjaman-urgent', [PeminjamanUrgentController::class, 'form'])->middleware('auth')->name('form.pinjaman.urgent');
Route::get('/peminjaman-urgent/create', [PeminjamanUrgentController::class, 'create'])->middleware('auth');
Route::post('/peminjaman-urgent', [PeminjamanUrgentController::class, 'store'])->middleware('auth')->name('pinjaman.urgent.store');
Route::get('/peminjaman-urgent/detail/{loan}', [PeminjamanUrgentController::class, 'detail'])->middleware('auth')->name('pinjaman.urgent.detail');


// Peminjaman Konsumtif Biasa
// Hanya bisa diakses oleh Ketua, Bendahara dan Pengawas
Route::middleware(['auth', CheckRoles::class . ':1,4,5'])->group(function () {
    Route::get('/peminjaman-konsumtif-biasa-index', [PeminjamanBiasaController::class, 'index'])->middleware(['auth', CheckRoles::class . ':1,4,5'])->name('pinjamanan.biasa.index');
    Route::get('/peminjaman-konsumtif-biasa/{loan}', [PeminjamanBiasaController::class, 'show'])->middleware(['auth', CheckRoles::class . ':1,4,5'])->name('pinjaman.biasa.show');
    Route::patch('/peminjaman-konsumtif-biasa/{loan}/reject', [PeminjamanBiasaController::class, 'reject'])->middleware(['auth', CheckRoles::class . ':1,4,5'])->name('pinjaman.biasa.reject');
});
// Hanya bisa diakses oleh Ketua
Route::patch('/peminjaman-konsumtif-biasa/{loan}/verifyKetua', [PeminjamanBiasaController::class, 'verifyKetua'])->middleware(['auth', CheckRoles::class . ':1'])->name('pinjaman.biasa.verifyKetua');
// Hanya bisa diakses oleh Bendahara
Route::patch('/peminjaman-konsumtif-biasa/{loan}/verifyBendahara', [PeminjamanBiasaController::class, 'verifyBendahara'])->middleware(['auth', CheckRoles::class . ':4'])->name('pinjaman.biasa.verifyBendahara');
// Hanya bisa diakses oleh Pengawas
Route::patch('/peminjaman-konsumtif-biasa/{loan}/verifyPengawas', [PeminjamanBiasaController::class, 'verifyPengawas'])->middleware(['auth', CheckRoles::class . ':5'])->name('pinjaman.biasa.verifyPengawas');

Route::get('/pengajuan-peminjaman-konsumtif-biasa', [PeminjamanBiasaController::class, 'form'])->middleware('auth')->name('form.pinjaman.biasa');
Route::get('/peminjaman-konsumtif-biasa/create', [PeminjamanBiasaController::class, 'create'])->middleware('auth');
Route::post('/peminjaman-konsumtif-biasa', [PeminjamanBiasaController::class, 'store'])->middleware('auth')->name('pinjaman.biasa.store');
Route::get('/peminjaman-konsumtif-biasa/detail/{loan}', [PeminjamanBiasaController::class, 'detail'])->middleware('auth')->name('pinjaman.biasa.detail');


// Peminjaman Konsumtif Khusus
//  Hanya bisa diakses oleh Pengawas, Bendahara, SDM, Kepala Bagian dan Ketua
Route::middleware(['auth', CheckRoles::class . ':1,2,3,4,5'])->group(function () {
    Route::get('/peminjaman-konsumtif-khusus-index', [PeminjamanKhususController::class, 'index'])->name('pinjamanan.khusus.index');
    Route::get('/peminjaman-konsumtif-khusus/{loan}', [PeminjamanKhususController::class, 'show'])->name('pinjaman.khusus.show');
    Route::patch('/peminjaman-konsumtif-khusus/{loan}/reject', [PeminjamanKhususController::class, 'reject'])->name('pinjaman.khusus.reject');
});
// Hanya bisa diakses oleh Ketua
Route::patch('/peminjaman-konsumtif-khusus/{loan}/verifyKetua', [PeminjamanKhususController::class, 'verifyKetua'])->middleware(['auth', CheckRoles::class . ':1'])->name('pinjaman.khusus.verifyKetua');
// Hanya bisa diakses oleh Kepala Bagian
Route::patch('/peminjaman-konsumtif-khusus/{loan}/verifyKepalaBagian', [PeminjamanKhususController::class, 'verifyKepalaBagian'])->middleware(['auth', CheckRoles::class . ':2'])->name('pinjaman.khusus.verifyKepalaBagian');
// Hanya bisa diakses oleh SDM
Route::patch('/peminjaman-konsumtif-khusus/{loan}/verifySDM', [PeminjamanKhususController::class, 'verifySDM'])->middleware(['auth', CheckRoles::class . ':3'])->name('pinjaman.khusus.verifySDM');
// Hanya bisa diakses oleh Bendahara
Route::patch('/peminjaman-konsumtif-khusus/{loan}/verifyBendahara', [PeminjamanKhususController::class, 'verifyBendahara'])->middleware(['auth', CheckRoles::class . ':4'])->name('pinjaman.khusus.verifyBendahara');
// Hanya bisa diakses oleh Pengawas
Route::patch('/peminjaman-konsumtif-khusus/{loan}/verifyPengawas', [PeminjamanKhususController::class, 'verifyPengawas'])->middleware(['auth', CheckRoles::class . ':5'])->name('pinjaman.khusus.verifyPengawas');

Route::get('/pengajuan-peminjaman-konsumtif-khusus', [PeminjamanKhususController::class, 'form'])->middleware('auth')->name('form.pinjaman.khusus');
Route::get('/peminjaman-konsumtif-khusus/create', [PeminjamanKhususController::class, 'create']);
Route::post('/peminjaman-konsumtif-khusus', [PeminjamanKhususController::class, 'store'])->middleware('auth')->name('pinjaman.khusus.store');
Route::get('/peminjaman-konsumtif-khusus/detail/{loan}', [PeminjamanKhususController::class, 'detail'])->middleware('auth')->name('pinjaman.khusus.detail');

Route::middleware(['auth', CheckRoles::class . ':4'])->group(function () {
    // Pembayaran Urgent
    Route::get('/pembayaran-urgent-index', [PembayaranUrgentController::class, 'index'])->name('pembayaran.urgent.index');
    Route::post('/pembayaran-urgent-store', [PembayaranUrgentController::class, 'store'])->name('pembayaran.urgent.store');
    
    // Pembayaran Konsumtif Khusus
    Route::get('/pembayaran-khusus-index', [PembayaranKhususController::class, 'index'])->name('pembayaran.khusus.index');
    Route::post('/pembayaran-khusus-store', [PembayaranKhususController::class, 'store'])->name('pembayaran.khusus.store');
    
    // Pembayaran Konsumtif Biasa
    Route::get('/pembayaran-biasa-index', [PembayaranBiasaController::class, 'index'])->name('pembayaran.biasa.index');
    Route::post('/pembayaran-biasa-store', [PembayaranBiasaController::class, 'store'])->name('pembayaran.biasa.store');
    
    // Bunga
    Route::get('/persentase-bunga-index', [PersentaseBungaController::class, 'index'])->name('persentase.bunga.index');
    Route::put('/persentase-bunga-index/{bunga}', [PersentaseBungaController::class, 'update'])->name('persentase.bunga.update');
});

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
Route::get('/pembayaran-biasa-mutasi', [PembayaranBiasaController::class, 'MutasiUser'])->name('pembayaran.biasa.mutasi');
Route::get('/pembayaran-khusus-mutasi', [PembayaranKhususController::class, 'MutasiUser'])->name('pembayaran.khusus.mutasi');
Route::get('/pembayaran-urgent-mutasi', [PembayaranUrgentController::class, 'MutasiUser'])->name('pembayaran.urgent.mutasi');
Route::get('/pembayaran-biasa-create/{id}', [PembayaranBiasaController::class, 'create'])->name('pembayaran.biasa.create');
Route::get('/pembayaran-khusus-create/{id}', [PembayaranKhususController::class, 'create'])->name('pembayaran.khusus.create');
Route::get('/pembayaran-urgent-create/{id}', [PembayaranUrgentController::class, 'create'])->name('pembayaran.urgent.create');


Route::get('tester', [DependentDropdownController::class, 'index'])->name('laravolt.index');
Route::get('get-kota', [RegisterController::class, 'get_kota'])->name('get.kota');
Route::get('get-kecamatan', [RegisterController::class, 'get_kecamatan'])->name('get.kecamatan');
Route::get('get-kelurahan', [RegisterController::class, 'get_kelurahan'])->name('get.kelurahan');