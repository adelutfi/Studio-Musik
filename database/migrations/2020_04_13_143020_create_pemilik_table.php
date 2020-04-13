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
            $table->text('alamat');
            $table->char('no_telp',13)->unique();
            $table->char('no_rek', 16)->unique();
            $table->boolean('status')->default(true);
            $table->timestamp('di_buat')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('di_ubah')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
