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
          $table->char('no_transaksi', 14)->unique();
          $table->bigInteger('id_penyewa')->unsigned();
          $table->bigInteger('id_studio')->unsigned();
          $table->integer('harga')->length(8);
          $table->integer('durasi')->length(2);
          $table->date('tanggal');
          $table->time('waktu');
          $table->integer('ruangan');
          $table->boolean('status')->nullable();
          $table->boolean('rating')->default(0);
          $table->text('snap_token')->nullable();
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
