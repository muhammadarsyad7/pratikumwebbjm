<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// 1. Ubah ini agar saat dibuka langsung muncul Login
Route::get('/', function () {
    return view('login'); 
});

// 2. Route untuk menampilkan halaman login (GET)
Route::get('/login', function () {
    return view('login');
})->name('login');

// 3. Route untuk memproses data login (POST)


// admin route


// routing crud Barang
