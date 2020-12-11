<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('username')->unique();
            $table->string('password');
            $table->bigInteger('nik');  
            $table->uuid('id_role');
            $table->smallInteger('status')->comment('0=Belum Aktif,1=Sudah Aktif');  
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
        Schema::dropIfExists('pengguna');
    }
}
