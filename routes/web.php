<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminTableViewController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/surats', [SuratController::class, 'index']);


// Route untuk mengambil nama user berdasarkan ID
Route::get('/getUserName', [SuratController::class, 'getUserName']);
Route::get('/getAllUser', [SuratController::class, 'getAllUser']);
Route::get('/getAllCategory', [SuratController::class, 'getAllKategori']);

// Route untuk mengambil nama kategori surat berdasarkan ID
Route::get('/getCategoryName', [SuratController::class, 'getCategoryName']);

// Auth::routes();

// Route untuk halaman pengajuan surat
Route::get('/request', function () {
    return view('ajukan.ajukan');
});

// Route untuk menyimpan form pengajuan surat
Route::post('/request', [SuratController::class, 'store'])->name('request.store');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/admintableview', [AdminTableViewController::class, 'index'])->name('admintableview.index')->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
