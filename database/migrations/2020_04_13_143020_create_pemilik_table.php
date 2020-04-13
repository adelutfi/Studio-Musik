<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->timestamp('verifikasi_email')->nullable();
            $table->text('alamat')->nullable();
            $table->char('no_telp',13)->unique()->nullable();
            $table->char('no_rek', 16)->unique()->nullable();
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
        Schema::dropIfExists('pemilik');
    }
}
