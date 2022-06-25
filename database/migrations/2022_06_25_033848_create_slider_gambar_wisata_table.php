<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderGambarWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_gambar_wisata', function (Blueprint $table) {
            $table->bigIncrements('slider_gambar_wisata_id');
            $table->string('nama');
            $table->string('gambar');
            // slider ke wisata
            $table->unsignedBigInteger('wisata_id');
            $table
                ->foreign('wisata_id')
                ->references('wisata_id')
                ->on('wisata')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_gambar_wisata');
    }
}
