<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrategiPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategi_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('model_pembelajaran');
            // $table->string('metode_pembelajaran');
            $table->longText('deskripsi_kegiatan');
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
        Schema::dropIfExists('strategi_pembelajaran');
    }
}
