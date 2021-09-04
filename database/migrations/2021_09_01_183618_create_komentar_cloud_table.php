<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarCloudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_cloud', function (Blueprint $table) {
            $table->id();
            $table->longText('comment');
            $table->foreignId('id_admin_cloud')->constrained('admin_cloud')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('komentar_cloud');
    }
}
