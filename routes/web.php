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


Route::get('stock/export/excel', [StockController::class, 'exportExcel']);
// Route untuk Stock hanya perlu Read dan Export
Route::get('/', [BarangController::class, 'index']);
Route::get('/suplier', [SuplierController::class, 'index']);
Route::get('/stock', [StockController::class, 'index']);
Route::get('/pembelian', [PembelianController::class, 'index']);
Route::get('/stock/export-pdf', [StockController::class, 'exportPdf']);
Route::get('/stock/export-excel', [StockController::class, 'exportExcel']);



