<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKompetensiDasarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetensi_dasar', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pengetahuan');
            $table->string('keterangan_pengetahuan');
            $table->string('kd_ketrampilan');
            $table->string('keterangan_ketrampilan');
            $table->longText('materi_inti');
            $table->string('durasi');
            $table->string('pertemuan');
            $table->integer('jam_pertemuan');
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->integer('semester_kd');
            $table->foreignId('id_bidang_keahlian')->constrained('bidang_keahlian')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kompetensi_dasar');
    }
}
