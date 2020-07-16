<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananTempatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_tempat', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('id_penyewa')->unsigned();
          $table->bigInteger('id_studio')->unsigned();
          $table->integer('harga');
          $table->integer('durasi');
          $table->date('tanggal');
          $table->time('waktu');
          $table->integer('ruangan');
          $table->string('pembayaran');
          $table->boolean('status')->nullable();
          $table->string('snap_token')->nullable();
          $table->timestamp('di_buat')->useCurrent();

          $table->foreign('id_penyewa')->references('id')->on('penyewa')->onDelete('CASCADE');
          $table->foreign('id_studio')->references('id')->on('studio')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan_tempat');
    }
}