<?php

namespace App\Http\Controllers;

use App\Models\Hbeli;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Hbeli::with('details')->get();
        return view('pembelian.index', compact('pembelian')); 
    }
}
