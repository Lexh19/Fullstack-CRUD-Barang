<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';
    protected $fillable = ['kodebrg', 'namabrg', 'satuan', 'hargabeli'];
}
