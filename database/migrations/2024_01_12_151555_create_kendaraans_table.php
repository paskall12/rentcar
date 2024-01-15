<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('model');
            $table->string('nomor_plat');
            $table->decimal('harga', 10);
            $table->string('status');
            $table->softDeletes(); // Untuk soft delete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}

