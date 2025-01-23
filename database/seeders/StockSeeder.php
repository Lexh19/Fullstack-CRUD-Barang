<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run()
    {
        Stock::insert([
            ['kodebrg' => 'BRG001', 'qty' => 10],
            ['kodebrg' => 'BRG002', 'qty' => 15],
            ['kodebrg' => 'BRG003', 'qty' => 20],
        ]);
    }
}
