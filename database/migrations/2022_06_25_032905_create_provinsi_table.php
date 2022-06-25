<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsi', function (Blueprint $table) {
            $table->bigIncrements('provinsi_id');
            $table->string('no_provinsi');
            $table->string('nama');
            $table->string('slug');
            $table->unsignedBigInteger('kawasan_id');
            $table
                ->foreign('kawasan_id')
                ->references('kawasan_id')
                ->on('kawasan')
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
        Schema::dropIfExists('provinsi');
    }
}
