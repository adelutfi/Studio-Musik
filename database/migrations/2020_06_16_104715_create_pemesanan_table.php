<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_penyewa')->unsigned();
            $table->bigInteger('id_studio')->unsigned();
            $table->enum('keterangan', ['sewa alat', 'sewa tempat']);
            $table->integer('harga');
            $table->date('tanggal');
            $table->time('waktu')->nullable();
            $table->integer('ruangan')->nullable();
            $table->integer('durasi');
            $table->string('pembayaran');
            $table->boolean('status')->default(false);
            $table->string('nama');
            $table->char('no_telp', 13);
            $table->text('alamat');
            $table->timestamp('di_buat')->useCurrent();
            $table->timestamp('di_ubah')->useCurrent();

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
        Schema::dropIfExists('pemesanan');
    }
}
