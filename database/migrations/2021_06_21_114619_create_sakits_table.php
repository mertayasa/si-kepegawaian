<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSakitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sakit', function (Blueprint $table) {
            $table->id();
            $table->string('pegawai_nip')->nullable();
            $table->text('surat_ket');
            $table->date('tanggal');
            $table->text('alasan');
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
        Schema::dropIfExists('sakit');
    }
}
