<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorKetercapaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator_ketercapaian', function (Blueprint $table) {
            $table->id();
            $table->longText('bukti');
            $table->string('ketuntasan');
            $table->string('jumlah_pertemuan');
            $table->longText('alat_bahan');
            $table->longText('sumber_pembelajaran');
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
        //
    }
}
