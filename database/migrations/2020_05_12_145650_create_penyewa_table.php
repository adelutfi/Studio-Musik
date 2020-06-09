<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('foto')->default('gambar/foto.png');
            $table->string('ktp')->nullable();
            $table->boolean('verifikasi_ktp')->default(true);
            $table->timestamp('verifikasi_email')->nullable();
            $table->text('alamat')->nullable();
            $table->char('no_telp',13)->unique()->nullable();
            $table->boolean('status')->default(true);
            $table->timestamp('di_buat')->useCurrent();
            $table->timestamp('di_ubah')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyewa');
    }
}
