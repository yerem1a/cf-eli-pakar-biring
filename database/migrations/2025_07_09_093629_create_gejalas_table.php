<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGejalasTable extends Migration
{
    public function up()
    {
        Schema::create('gejalas', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('gangguan_id');
    $table->string('pertanyaan');
    $table->decimal('cf_pakar', 3, 1); // <- Pastikan baris ini ADA
    $table->timestamps();

    $table->foreign('gangguan_id')->references('id')->on('gangguans')->onDelete('cascade');
});

    }

    public function down()
    {
        Schema::dropIfExists('gejala');
    }
}
