<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewasTable extends Migration
{
    public function up()
    {
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->string('no_sim')->nullable();
            $table->softDeletes(); // Untuk soft delete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyewa');
    }
}
