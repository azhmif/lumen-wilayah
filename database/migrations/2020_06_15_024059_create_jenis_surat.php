<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_surat', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->bigInteger('id_desa');
            $table->string('nama');
            $table->uuid('id_ukuran_kertas');
            $table->string('nama_table');
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
        Schema::dropIfExists('jenis_surat');
    }
}
