<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Tabel Barang
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kodebrg', 10)->unique();
            $table->string('namabrg', 100);
            $table->string('satuan', 10);
            $table->integer('hargabeli');
            $table->timestamps();
        });

        // Tabel Suplier
        Schema::create('tbl_suplier', function (Blueprint $table) {
            $table->id();
            $table->string('kodespl', 10)->unique();
            $table->string('namaspl', 100);
            $table->timestamps();
        });

        // Tabel Pembelian Header
        Schema::create('tbl_hbeli', function (Blueprint $table) {
            $table->id();
            $table->string('notransaksi', 10)->unique();
            $table->string('kodespl', 10);
            $table->dateTime('tglbeli');
            $table->timestamps();

            $table->foreign('kodespl')->references('kodespl')->on('tbl_suplier')->onDelete('cascade');
        });

        // Tabel Pembelian Detail
        Schema::create('tbl_dbeli', function (Blueprint $table) {
            $table->id();
            $table->string('notransaksi', 10);
            $table->string('kodebrg', 10);
            $table->integer('hargabeli');
            $table->integer('qty');
            $table->integer('diskon')->default(0);
            $table->integer('diskonrp')->default(0);
            $table->integer('totalrp');
            $table->timestamps();

            $table->foreign('notransaksi')->references('notransaksi')->on('tbl_hbeli')->onDelete('cascade');
            $table->foreign('kodebrg')->references('kodebrg')->on('tbl_barang')->onDelete('cascade');
        });

        // Tabel Stock
        Schema::create('tbl_stock', function (Blueprint $table) {
            $table->string('kodebrg', 10)->primary();
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('kodebrg')->references('kodebrg')->on('tbl_barang')->onDelete('cascade');
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
