<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->bigIncrements('wisata_id');
            $table->string('no_wisata');
            $table->string('nama');
            $table->string('slug');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->string('kode_pos');
            $table->string('slider_gambar_wisata_id');
            $table->unsignedBigInteger('kepulauan_id');
            $table
                ->foreign('kepulauan_id')
                ->references('kepulauan_id')
                ->on('kepulauan')
                ->cascadeOnDelete();
            // provinsi
            $table->unsignedBigInteger('provinsi_id');
            $table
                ->foreign('provinsi_id')
                ->references('provinsi_id')
                ->on('provinsi')
                ->cascadeOnDelete();
            // kabupaten
            $table->unsignedBigInteger('kabupaten_id');
            $table
                ->foreign('kabupaten_id')
                ->references('kabupaten_id')
                ->on('kabupaten')
                ->cascadeOnDelete();
            // daerah
            $table->unsignedBigInteger('daerah_id');
            $table
                ->foreign('daerah_id')
                ->references('daerah_id')
                ->on('daerah')
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
        Schema::dropIfExists('wisata');
    }
}
