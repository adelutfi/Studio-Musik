<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {

            $table->bigInteger('id_studio')->unsigned();
            $table->integer('nilai')->length(10)->unsigned();
            $table->integer('jumlah')->length(10)->unsigned()->default(1);

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
        Schema::dropIfExists('rating');
    }
}
