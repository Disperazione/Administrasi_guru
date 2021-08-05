<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriBahanAjarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_bahan_ajar', function (Blueprint $table) {
            $table->id();
            $table->string('modul');
            $table->string('vidio_pembelajaran');
            $table->longText('deskripsi_bahan_ajar');
            $table->longText('keterangan')->nullable();
            $table->foreignId('id_kompetensi_dasar')->constrained('kompetensi_dasar')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_bahan_ajar');
    }
}
