<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratArsipController;
use App\Http\Controllers\AdminTableViewController;


Route::get('/', function () {
    return view('login.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk mengambil nama user berdasarkan ID
Route::get('/getUserName', [SuratController::class, 'getUserName']);
Route::get('/getAllUser', [SuratController::class, 'getAllUser']);
Route::get('/getAllCategory', [SuratController::class, 'getAllKategori']);

// Route untuk mengambil nama kategori surat berdasarkan ID
Route::get('/getCategoryName', [SuratController::class, 'getCategoryName']);

// Auth::routes();

// Route untuk halaman pengajuan surat
// Route::get('/dashboard/request', function () {
//     return view('ajukan.ajukan');
// });

Route::get('/dashboard/request', function () {
    return view('ajukan.ajukan');
})->middleware('App\Http\Middleware\CheckUserLevel:2');

// Route untuk menyimpan form pengajuan surat
Route::post('/dashboard/request', [SuratController::class, 'store'])->name('request.store')->middleware('App\Http\Middleware\CheckUserLevel:2');


// Route::get('/admintableview', [AdminTableViewController::class, 'index'])->name('admintableview.index')->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

//surat user
// Route::get('/dashboard/suratsaya', [SuratUserController::class, 'index'])->middleware('auth');
Route::get('/dashboard/suratsaya', [SuratUserController::class, 'index'])
    ->middleware(['auth', 'App\Http\Middleware\CheckUserLevel:2']);

//admin surat
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/dashboard/suratadmin', [SuratController::class, 'index']);
    // Tambahkan rute lain yang perlu diakses oleh admin di sini
});
Route::put('/updateStatus/{idSurat}', [SuratController::class, 'updateStatus']);

//admin arsip
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/dashboard/suratadmin/arsip', [SuratArsipController::class, 'index']);
    // Tambahkan rute lain yang perlu diakses oleh admin di sini
});
Route::put('/updateStatusArsip/{idSurat}', [SuratArsipController::class, 'updateStatusArsip']);

use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'level:user'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});

// Route for the guest dashboard
Route::get('/guest-dashboard', [DashboardController::class, 'guestDashboard'])->name('guest.dashboard');

