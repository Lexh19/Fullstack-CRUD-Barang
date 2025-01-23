<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'tbl_stock';
    protected $primaryKey = 'kodebrg';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kodebrg', 'qty'];
}

