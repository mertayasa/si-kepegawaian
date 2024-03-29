<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanksi', function (Blueprint $table) {
            $table->id();
            $table->string('pegawai_nip')->nullable();
            $table->text('golongan');
            // $table->text('jabatan');
            $table->text('keterangan');
            $table->text('surat_sanksi');
            $table->timestamps();

            $table->foreign('pegawai_nip')->references('nip')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanksi');
    }
}
