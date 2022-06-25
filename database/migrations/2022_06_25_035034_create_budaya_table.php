<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budaya', function (Blueprint $table) {
            $table->bigIncrements('budaya_id');
            $table->string('no_budaya');
            $table->string('nama');
            $table->string('slug');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->string('kode_pos');
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
        Schema::dropIfExists('budaya');
    }
}
