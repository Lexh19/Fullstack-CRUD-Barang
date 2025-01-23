<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PembelianController;




Route::get('/test-get', function () {
    return response()->json(['status' => 'GET method works']);
});

Route::post('/test-post', function (Request $request) {
    return response()->json(['status' => 'POST method works', 'data' => $request->all()]);
});



Route::get('/barang', [BarangController::class, 'getBarang']);
Route::get('/suplier', [SuplierController::class, 'index']);
Route::get('/suplier', [SuplierController::class, 'getSuplier']);


Route::get('/stock', [StockController::class, 'getstock']);
Route::get('/stock/export-pdf', [StockController::class, 'exportPdf']);
Route::get('/stock/export-excel', [StockController::class, 'exportExcel']);


Route::get('/pembelian', [PembelianController::class, 'getPembelian']);
Route::post('/pembelian', [PembelianController::class, 'store']);
Route::get('/pembelian/{id}', [PembelianController::class, 'show']);
Route::put('/pembelian/{id}', [PembelianController::class, 'update']);
Route::delete('/pembelian/{id}', [PembelianController::class, 'destroy']);



