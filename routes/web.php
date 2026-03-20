<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register',  [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/' , [LandingController::class, 'index'])->name('landing');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD ROUTES — diproteksi berdasarkan role
|--------------------------------------------------------------------------
*/

// Super Admin
Route::middleware(['auth', 'role:super_admin'])->prefix('super-admin')->name('super_admin.')->group(function () {
    Route::get('/dashboard', fn () => view('super_admin.dashboard'))->name('dashboard');
    // Route::resource('users', UserController::class);
    // Route::resource('products', ProductController::class);
});

// Admin
Route::middleware(['auth', 'role:admin,super_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    // Route::resource('products', ProductController::class);
    // Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
});

// Kasir
Route::middleware(['auth', 'role:kasir,admin,super_admin'])->prefix('kasir')->name('kasir.')->group(function () {
    Route::get('/dashboard', fn () => view('kasir.dashboard'))->name('dashboard');
    // Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    // Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
});

/*
|--------------------------------------------------------------------------
| FALLBACK
|--------------------------------------------------------------------------
*/
// Route::redirect('/', '/login');

