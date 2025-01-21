<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_suplier')->insert([
            ['kodespl' => 'SPL001', 'namaspl' => 'Suplier A'],
            ['kodespl' => 'SPL002', 'namaspl' => 'Suplier B'],
        ]);
    }
}
