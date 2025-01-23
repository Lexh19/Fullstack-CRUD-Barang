<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBeli extends Model
{
    protected $table = 'tbl_dbeli';
    protected $fillable = ['notransaksi', 'kodebrg', 'hargabeli', 'qty', 'diskon', 'diskonrp', 'totalrp'];

    public function header()
    {
        return $this->belongsTo(HBeli::class, 'notransaksi', 'notransaksi');
    }
}
