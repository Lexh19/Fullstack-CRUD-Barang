<?php
namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StockExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Stock::join('tbl_barang', 'tbl_stock.kodebrg', '=', 'tbl_barang.kodebrg')
            ->select('tbl_barang.namabrg', 'tbl_stock.qty')
            ->get();
    }

    public function headings(): array
    {
        return ['Nama Barang', 'Qty'];
    }
}
