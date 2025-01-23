<?php

namespace App\Http\Controllers;

use App\Models\DBeli;
use App\Models\HBeli;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PembelianController extends Controller
{
    public function index()
    {
        return view('purchase.index');
    }

    public function getPembelian()
    {
        $pembelian = HBeli::with('details')->get();
        return response()->json($pembelian);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $currentMonth = date('Ym');
            $lastTransaction = DB::table('tbl_hbeli')
                ->where('notransaksi', 'LIKE', 'B'.$currentMonth.'%')
                ->orderBy('notransaksi', 'desc')
                ->first();
            $lastNumber = $lastTransaction ? (int)substr($lastTransaction->notransaksi, -3) : 0;
            $newNumber = $lastNumber + 1;
            $notransaksi = 'B' . $currentMonth . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            DB::table('tbl_hbeli')->insert([
                'notransaksi' => $notransaksi,
                'kodespl' => $request->kodespl,
                'tglbeli' => $request->tglbeli,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($request->items as $item) {
                $totalrp = $item['qty'] * $item['hargabeli'];
                $diskonrp = $totalrp * $item['diskon'] / 100;

                DB::table('tbl_dbeli')->insert([
                    'notransaksi' => $notransaksi,
                    'kodebrg' => $item['kodebrg'],
                    'qty' => $item['qty'],
                    'hargabeli' => $item['hargabeli'],
                    'diskon' => $item['diskon'],
                    'diskonrp' => $diskonrp,
                    'totalrp' => $totalrp - $diskonrp,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('tbl_stock')->updateOrInsert(
                    ['kodebrg' => $item['kodebrg']],
                    ['qty' => DB::raw('qty + ' . $item['qty']), 'updated_at' => now()]
                );
            }

            DB::commit();
            return response()->json(['message' => 'Transaksi berhasil disimpan'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan', 'error' => $e->getMessage()], 500);
        }
    }
}
