<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Tabel Suplier
        Schema::create('tbl_suplier', function (Blueprint $table) {
            $table->id();
            $table->string('kodespl', 10);
            $table->string('namaspl', 100);
            $table->timestamps();
        });

        // Tabel Pembelian Header
        Schema::create('tbl_hbeli', function (Blueprint $table) {
            $table->id();
            $table->string('notransaksi', 10);
            $table->string('kodespl', 10);
            $table->dateTime('tglbeli');
            $table->timestamps();
        });

        // Tabel Pembelian Detail
        Schema::create('tbl_dbeli', function (Blueprint $table) {
            $table->id();
            $table->string('notransaksi', 10);
            $table->string('kodebrg', 10);
            $table->integer('hargabeli');
            $table->integer('qty');
            $table->integer('diskon');
            $table->integer('diskonrp');
            $table->integer('totalrp');
            $table->timestamps();
        });

        // Tabel Stock
        Schema::create('tbl_stock', function (Blueprint $table) {
            $table->string('kodebrg', 10)->primary();
            $table->integer('qty');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_stock');
        Schema::dropIfExists('tbl_dbeli');
        Schema::dropIfExists('tbl_hbeli');
        Schema::dropIfExists('tbl_suplier');
        Schema::dropIfExists('tbl_barang');
    }
}
