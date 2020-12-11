<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganAhliWarisDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_ahli_waris_detail', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_surat_keterangan_ahli_waris');
            $table->string('nama');
            $table->enum('jk',["Laki-Laki","Perempuan"]);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('shdk');
            $table->string('keterangan');
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
        Schema::dropIfExists('surat_keterangan_ahli_waris_detail');
    }
}
