<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembarKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembar_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('Lk_1')->nullable()->default('Teknologi Informasi');
            $table->string('Lk_2')->nullable()->default('Teknologi Informasi');
            $table->string('Lk_3')->nullable()->default('Teknologi Informasi');
            $table->string('Lk_4')->nullable()->default('Teknologi Informasi');
            $table->string('RPP')->nullable()->default('Teknologi Informasi');
            $table->bigInteger('id_bidang_keahlian')->unsigned();
            $table->foreign('id_bidang_keahlian')->references('id')->on('bidang_keahlian')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('lembar_kerja');
    }
}
