<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarAplikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_aplikasi', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->enum('level',["Provinsi","Kabupaten","Kecamatan","Desa"]);
            $table->bigInteger('id_wilayah');
            $table->string('link_web_aplikasi');
            $table->string('link_api');
            $table->string('link_mobile_aplikasi');
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
        Schema::dropIfExists('daftar_aplikasi');
    }
}
