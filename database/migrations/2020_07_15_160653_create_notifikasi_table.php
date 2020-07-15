<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
          $table->bigInteger('id_penyewa')->unsigned()->nullable();
          $table->bigInteger('id_pemilik')->unsigned()->nullable();
          $table->text('pesan');
          $table->string('keterangan');
          $table->boolean('status')->default(true);
          $table->timestamp('di_buat')->useCurrent();

          $table->foreign('id_penyewa')->references('id')->on('penyewa')->onDelete('CASCADE');
          $table->foreign('id_pemilik')->references('id')->on('pemilik')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
}
