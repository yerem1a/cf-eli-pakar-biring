<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilDiagnosaTable extends Migration
{
    public function up()
    {
        Schema::create('hasil_diagnosa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gangguan_id')->constrained()->onDelete('cascade');
            $table->decimal('cf_hasil', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_diagnosa');
    }
}