<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganAhliWaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_ahli_waris', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_jenis');
            $table->string('nomor');
            $table->date('tanggal_surat');
            $table->bigInteger('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('kewarganegaraan');
            $table->datetime('waktu_meninggal');
            $table->string('tempat_meninggal');
            $table->string('status_ttd')->nullable();
            $table->string('jabatan_ttd');
            $table->string('jabatan_pengganti_ttd')->nullable();
            $table->string('nama_ttd');
            $table->string('nip_ttd');
            $table->string('status_ttd2')->nullable();
            $table->string('jabatan_ttd2');
            $table->string('jabatan_pengganti_ttd2')->nullable();
            $table->string('nama_ttd2');
            $table->string('nip_ttd2');
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
        Schema::dropIfExists('surat_keterangan_ahli_waris');
    }
}
