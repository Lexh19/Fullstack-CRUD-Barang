<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index');
    }
    public function getBarang()
    {
        try {
            $barang = Barang::all();
            return response()->json(['data' => $barang]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data barang.'], 500);
        }
    }
}
