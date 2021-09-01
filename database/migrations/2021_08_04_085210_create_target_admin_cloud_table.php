<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetAdminCloudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_cloud', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->enum('status',['kosong','pending','acc','tolak','pending_2'])->default('kosong');
            $table->string('path');
            $table->foreignId('id_guru')->constrained('guru')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('admin_cloud');
    }
}
