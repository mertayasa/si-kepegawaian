<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('nip', 18)->default(0)->primary();
            $table->string('alamat', 150)->nullable();
            $table->string('no_hp', 150)->nullable();
            $table->string('umur', 150)->nullable();
            $table->string('jk', 10)->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('id_gaji');
            $table->foreign('id_gaji')->references('id')->on('gaji')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('pegawai');
    }
}
