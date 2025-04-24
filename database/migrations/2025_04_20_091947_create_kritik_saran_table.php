<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKritikSaranTable extends Migration
{
    public function up()
    {
        Schema::create('kritik_saran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('judul');
            $table->text('isi');
            $table->enum('status', ['dibaca', 'belum_dibaca'])->default('belum_dibaca');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kritik_saran');
    }
}
