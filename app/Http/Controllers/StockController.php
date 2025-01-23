<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Exports\StockExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
    public function index()
    {
        return view('stock.index');
    }

    public function getstock()
    {
        try {
            $stocks = Stock::all();
            return response()->json(['data' => $stocks]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Gagal memuat data stock.'], 500);
        }
    }

    public function exportPdf()
    {
        try {
            $stocks = Stock::join('tbl_barang', 'tbl_stock.kodebrg', '=', 'tbl_barang.kodebrg')
                ->select('tbl_barang.namabrg', 'tbl_stock.qty')
                ->get();

            $pdf = PDF::loadView('stock.pdf', ['stocks' => $stocks]);
            return $pdf->download('daftar_stock.pdf');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Gagal mengekspor data stok ke PDF.'], 500);
        }
    }

    public function exportExcel()
    {
        try {
            return Excel::download(new StockExport, 'daftar_stock.xlsx');
        } catch (\Exception $e) {
            Log::error($e->getMessage()); 
            return response()->json(['error' => 'Gagal mengekspor data stok ke Excel.'], 500);
        }
    }
}
