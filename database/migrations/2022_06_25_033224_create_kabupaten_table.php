<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->bigIncrements('kabupaten_id');
            $table->string('no_kabupaten');
            $table->string('nama');
            $table->string('slug');
            $table->unsignedBigInteger('kawasan_id');
            $table
                ->foreign('kawasan_id')
                ->references('kawasan_id')
                ->on('kawasan')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('provinsi_id');
            $table
                ->foreign('provinsi_id')
                ->references('provinsi_id')
                ->on('provinsi')
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
        Schema::dropIfExists('kabupaten');
    }
}
