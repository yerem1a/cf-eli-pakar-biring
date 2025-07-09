<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiUserTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_user', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan', 50);
            $table->decimal('nilai', 3, 1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_user');
    }
}