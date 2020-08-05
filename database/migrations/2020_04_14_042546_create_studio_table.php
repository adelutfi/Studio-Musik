<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 45);
            $table->text('gambar');
            $table->text('alamat');
            $table->text('keterangan');
            $table->boolean('status')->nullable();
            $table->bigInteger('id_pemilik')->unsigned();
            $table->timestamp('di_buat')->useCurrent();
            $table->timestamp('di_ubah')->useCurrent();

            $table->foreign('id_pemilik')->references('id')->on('pemilik')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studio');
    }
}
