<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kodebrg' => 'BRG001', 'namabrg' => 'Barang A', 'satuan' => 'pcs', 'hargabeli' => 10000],
            ['kodebrg' => 'BRG002', 'namabrg' => 'Barang B', 'satuan' => 'pcs', 'hargabeli' => 20000],
            ['kodebrg' => 'BRG003', 'namabrg' => 'Barang C', 'satuan' => 'box', 'hargabeli' => 30000],
        ];

        foreach ($data as $item) {
            DB::table('tbl_barang')->updateOrInsert(
                ['kodebrg' => $item['kodebrg']],
                $item

            );
        }
    }
}
