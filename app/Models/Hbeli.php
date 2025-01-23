<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HBeli extends Model
{
    protected $table = 'tbl_hbeli';
    protected $fillable = ['notransaksi', 'kodespl', 'tglbeli'];

    public static function generateNoTransaksi()
    {
        $prefix = 'B';
        $date = now();
        $year = $date->format('Y');
        $month = $date->format('m');

        $lastTransaction = self::whereYear('tglbeli', $year)
            ->whereMonth('tglbeli', $month)
            ->orderBy('notransaksi', 'desc')
            ->first();

        $lastNumber = $lastTransaction ? intval(substr($lastTransaction->notransaksi, -3)) : 0;
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return $prefix . $year . $month . $newNumber;
    }

    public function details()
    {
        return $this->hasMany(DBeli::class, 'notransaksi', 'notransaksi');
    }
}
