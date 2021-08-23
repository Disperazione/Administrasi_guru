<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKdTargetPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kd_target_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_target_pembelajaran')->constrained('target_pembelajaran')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kd_target_pembelajaran');
    }
}
