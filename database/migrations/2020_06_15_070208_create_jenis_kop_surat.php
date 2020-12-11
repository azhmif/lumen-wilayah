<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisKopSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_kop_surat', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->enum('jenis',["Logo Kiri","Logo Kanan","Logo Kiri & Kanan","Tanpa Logo","Tanpa Kop"]);
            $table->text('detail_jenis');
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
        Schema::dropIfExists('jenis_kop_surat');
    }
}
