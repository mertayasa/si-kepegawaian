<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajisTable extends Migration
{
    public function up(){
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->string('golongan');
            $table->string('jabatan')->nullable();
            $table->integer('gaji')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('gajis');
    }
}
