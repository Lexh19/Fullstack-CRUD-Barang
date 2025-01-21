<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PembelianController;

// Route utama (Welcome page)
Route::get('/', function () {
    return view('welcome');
});

// Resource routes untuk Barang, Suplier, dan Pembelian
Route::resource('barang', BarangController::class);
Route::resource('suplier', SuplierController::class);
Route::resource('pembelian', PembelianController::class);

// Route untuk Stock hanya perlu Read dan Export
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/stock', [StockController::class, 'index']);
Route::get('/stock/export-pdf', [StockController::class, 'exportPdf']);
Route::get('/stock/export-excel', [StockController::class, 'exportExcel']);

