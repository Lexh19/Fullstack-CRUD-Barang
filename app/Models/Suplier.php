<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suplier extends Model
{
    use HasFactory;

    protected $table = 'tbl_suplier';
    protected $fillable = ['kodespl', 'namaspl'];
}
