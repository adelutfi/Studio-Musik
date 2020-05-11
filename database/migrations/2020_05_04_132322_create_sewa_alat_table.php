<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewaAlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa_alat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_studio')->unsigned();
            $table->integer('harga')->length(6)->unsigned();
            $table->text('keterangan');
            $table->string('jadwal');
            $table->timestamp('di_buat')->useCurrent();
            $table->timestamp('di_ubah')->useCurrent();

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
        Schema::dropIfExists('sewa_alat');
    }
}
