<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaerahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daerah', function (Blueprint $table) {
            $table->bigIncrements('daerah_id');
            $table->string('no_daerah');
            $table->string('nama');
            $table->string('slug');

            $table->unsignedBigInteger('kepulauan_id');
            $table
                ->foreign('kepulauan_id')
                ->references('kepulauan_id')
                ->on('kepulauan')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('provinsi_id');

            $table
                ->foreign('provinsi_id')
                ->references('provinsi_id')
                ->on('provinsi')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('kabupaten_id');
            $table
                ->foreign('kabupaten_id')
                ->references('kabupaten_id')
                ->on('kabupaten')
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
        Schema::dropIfExists('daerah');
    }
}
