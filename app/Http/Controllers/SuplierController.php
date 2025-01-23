<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {

        return view('suplier.index');
    }
    public function getSuplier()
    {
        try {
            $supliers = Suplier::all();
            return response()->json(['data' => $supliers]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data suplier.'], 500);
        }
    }
}
