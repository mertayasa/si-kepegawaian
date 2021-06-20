<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPegawaiTable extends Migration
{
    public function up(){
        Schema::table('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(){
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
