<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

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


//navbar routes

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/surats', [SuratController::class, 'index'])->name('surats.index');
