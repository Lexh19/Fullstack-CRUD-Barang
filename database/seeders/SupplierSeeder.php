<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kodespl' => 'SPL001', 'namaspl' => 'Suplier A'],
            ['kodespl' => 'SPL002', 'namaspl' => 'Suplier B'],
            ['kodespl' => 'SPL003', 'namaspl' => 'Suplier C'],
            ['kodespl' => 'SPL004', 'namaspl' => 'Suplier D'],
            ['kodespl' => 'SPL005', 'namaspl' => 'Suplier E'],
        ];

        foreach ($data as $item) {
            DB::table('tbl_suplier')->updateOrInsert(
                ['kodespl' => $item['kodespl']],
                [
                    'namaspl' => $item['namaspl'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
