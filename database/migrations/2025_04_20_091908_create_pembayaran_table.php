<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->string('jenis_pembayaran');
            $table->decimal('jumlah', 12, 2);
            $table->date('tanggal_bayar');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['menunggu', 'dikonfirmasi', 'ditolak'])->default('menunggu');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
