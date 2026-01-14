<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LaporanController;
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
Route::post('/login', [LoginController::class, 'login']);

// admin route
Route::get('/admin', [AdminController::class, 'admin']);

// routing crud Barang
Route::get('/admin/barang', [AdminController::class, 'barang']);
Route::get('/admin/barang/tambah', [AdminController::class, 'tambah_barang']);
Route::get('/admin/barang/edit/{id}', [AdminController::class, 'edit_barang']);
Route::get('/admin/barang/delete/{id}', [AdminController::class, 'delete_barang']);
Route::post('/admin/barang/simpan', [AdminController::class, 'simpan_barang']);
Route::post('/admin/barang/update/{id}', [AdminController::class, 'update_barang']);
// routing crud Barang Masuk
Route::get('/admin/barang-masuk', [BarangMasukController::class, 'index']);
Route::get('/admin/barang-masuk/tambah', [BarangMasukController::class, 'tambah']);
Route::post('/admin/barang-masuk/simpan', [BarangMasukController::class, 'simpan']);
// routing crud Barang Keluar
Route::get('/admin/barang-keluar', [BarangKeluarController::class, 'index']);
Route::get('/admin/barang-keluar/tambah', [BarangKeluarController::class, 'tambah']);
Route::post('/admin/barang-keluar/simpan', [BarangKeluarController::class, 'simpan']);

Route::get('/admin/laporan', [LaporanController::class, 'index']);
Route::get('/admin/laporan/barang', [LaporanController::class, 'cetak_barang']);

