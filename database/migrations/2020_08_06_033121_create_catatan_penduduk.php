<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_penduduk', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->bigInteger('nik');
            $table->enum('penalti',['0','1'])->default('0');
            $table->text('layanan');
            $table->bigInteger('catatan');
            $table->uuid('id_pengguna');
            $table->enum('status',['0','1'])->default('0');

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
        Schema::dropIfExists('catatan_penduduk');
    }
}
