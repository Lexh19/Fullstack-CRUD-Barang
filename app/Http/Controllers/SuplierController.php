<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all(); // Mengambil semua data dari tabel tbl_suplier
        return view('suplier.index', compact('supliers')); // Kirim data ke view
    }
}
