<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hbeli extends Model
{
    use HasFactory;

    protected $table = 'tbl_hbeli';
    protected $fillable = ['notransaksi', 'kodespl', 'tglbeli'];
}
