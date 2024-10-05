<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Berita
Route::get('/berita', function () {
    return view('berita');
})->name('berita');

// Pilihan Transportasi
Route::get('/pilihan-transportasi', function () {
    return view('pilihan_transportasi');
})->name('pilihan.transportasi');

// Rute Bus
Route::get('/rute-bus', function () {
    return view('rute_bus');
})->name('rute.bus');

// Detail Rute Bus
Route::get('/detail-rute-bus/{id}', function ($id) {
    return view('detail_rute_bus', ['id' => $id]);
})->name('detail.rute.bus');

// Rute Kereta
Route::get('/rute-kereta', function () {
    return view('rute_kereta');
})->name('rute.kereta');

// Detail Rute Kereta
Route::get('/detail-rute-kereta/{id}', function ($id) {
    return view('detail_rute_kereta', ['id' => $id]);
})->name('detail.rute.kereta');

// Diskusi
Route::get('/diskusi', function () {
    return view('diskusi');
})->name('diskusi');

// Kontak Kami
Route::get('/contact-us', function () {
    return view('contact_us');
})->name('contact.us');

// Register (Form)
Route::get('/register', function () {
    return view('register');
})->name('register');

// Menangani pengiriman form register (POST)
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Login (Form)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Menangani pengiriman form login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
