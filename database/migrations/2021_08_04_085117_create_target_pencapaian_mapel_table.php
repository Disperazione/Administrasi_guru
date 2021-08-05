<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetPencapaianMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_pencapaian_mapel', function (Blueprint $table) {
            $table->id();
            $table->string('target');
            $table->string('keterangan')->nullable();
            $table->foreignId('id_target_pembelajaran')->constrained('target_pembelajaran')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('target_pencapaian_mapel');
    }
}
