<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id_transaksi');
            $table->string('karyawan_id');
            $table->string('pelanggan_id');
            $table->bigInteger('kategori_id');
            $table->integer('berat_barang');
            $table->integer('satuan_barang');
            $table->integer('total_harga');
            $table->enum('status_pembayaran',['lunas','belum lunas']);
            $table->enum('proses',['selesai','belum selesai']);
            $table->timestamps();
            $table->primary('id_transaksi');
        });
        // Schema::table('transaksis', function( Blueprint$table)
        // {
        //     $table->foreign('karyawan_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreign('pelanggan_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
