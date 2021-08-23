<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangKeahlianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_keahlian', function (Blueprint $table) {
            $table->id();
            //$table->string('bidang_studi'); <- table lembar kerja
            $table->string('mapel'); // mapel
            //$table->string('kompetensi_keahlian');
            $table->foreignId('id_jurusan')->constrained('jurusan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kelas');
            $table->string('jam_pelajaran');
            $table->string('total_waktu_jam_pelajaran');
            $table->foreignId('id_guru')->constrained('guru')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bidang_keahlian');
    }
}
