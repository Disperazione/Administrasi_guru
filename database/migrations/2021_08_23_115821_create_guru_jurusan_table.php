<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_jurusan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guru')->constrained('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_jurusan')->constrained('jurusan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('guru_jurusan');
    }
}
