<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dbeli extends Model
{
    use HasFactory;

    protected $table = 'tbl_dbeli';
    protected $fillable = ['notransaksi', 'kodebrg', 'hargabeli', 'qty', 'diskon', 'diskonrp', 'totalrp'];
}
