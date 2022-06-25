<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepulauanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepulauan', function (Blueprint $table) {
            $table->bigIncrements('kepulauan_id');
            $table->string('no_kepulauan');
            $table->string('nama');
            $table->string('slug');
            $table->timestamp('dibuat_pada');
            $table->timestamp('diubah_pada');
            $table->timestamp('dihapus_pad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kepulauan');
    }
}
