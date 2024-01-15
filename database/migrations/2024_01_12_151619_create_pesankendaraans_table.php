<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesankendaraansTable extends Migration
{
    public function up()
    {
        Schema::create('pesankendaraan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('penyewa_id');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali')->nullable();
            $table->integer('lama_penggunaan'); // Menambah field lama_penggunaan
            $table->decimal('total_biaya', 10); // Menambah field total_biaya
            $table->softDeletes(); // Untuk soft delete
            $table->timestamps();

            // Definisikan foreign key constraints secara eksplisit
            $table->foreign('kendaraan_id')->references('id')->on('kendaraan')->onDelete('cascade');
            $table->foreign('penyewa_id')->references('id')->on('penyewa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesankendaraan');
    }
}

