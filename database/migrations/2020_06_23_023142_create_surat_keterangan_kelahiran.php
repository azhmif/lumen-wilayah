<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganKelahiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_kelahiran', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_jenis');
            $table->string('nomor');
            $table->date('tanggal_surat');
            $table->bigInteger('nik_anak');
            $table->string('nama_anak');
            $table->string('tempat_lahir_anak');
            $table->date('tanggal_lahir_anak');
            $table->string('nama_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->bigInteger('nik_ayah');
            $table->string('alamat_ayah');
            $table->string('nama_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->string('nik_ibu');
            $table->string('alamat_ibu');
            $table->string('nama_pelapor');
            $table->string('tempat_lahir_pelapor');
            $table->date('tanggal_lahir_pelapor');
            $table->bigInteger('nik_pelapor');
            $table->string('alamat_pelapor');
            $table->string('hubungan_pelapor');
            $table->string('status_ttd');
            $table->string('jabatan_ttd');
            $table->string('jabatan_pengganti_ttd');
            $table->string('nama_ttd');
            $table->string('nip_ttd');
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
        Schema::dropIfExists('surat_keterangan_kelahiran');
    }
}
