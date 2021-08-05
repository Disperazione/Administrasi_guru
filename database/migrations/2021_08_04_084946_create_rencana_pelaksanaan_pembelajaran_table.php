<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaPelaksanaanPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_pelaksanaan_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('ipk_kd_ketrampilan');
            $table->string('ipk_kd_pengetahuan');
            $table->string('alokasi_waktu');
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
        Schema::dropIfExists('rencana_pelaksanaan_pembelajaran');
    }
}
