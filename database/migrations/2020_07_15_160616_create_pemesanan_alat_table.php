<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_alat', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->char('no_transaksi', 14)->unique();
          $table->bigInteger('id_penyewa')->unsigned();
          $table->bigInteger('id_studio')->unsigned();
          $table->integer('harga');
          $table->date('tanggal_mulai');
          $table->date('tanggal_selesai');
          $table->time('jam_penyewaan');
          $table->time('jam_pengembalian');
          $table->boolean('status')->nullable();
          $table->string('nama', 50);
          $table->char('no_telp',13);
          $table->text('alamat');
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
        Schema::dropIfExists('pemesanan_alat');
    }
}
