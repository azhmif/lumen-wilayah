<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganPernahNikah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_pernah_nikah', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_jenis');
            $table->string('nomor');
            $table->date('tanggal_surat');
            $table->bigInteger('nik');
            $table->string('nama_pemohon');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('alamat');
            $table->string('nama_pasangan');
            $table->string('tempat_lahir_pasangan');
            $table->date('tanggal_lahir_pasangan');
            $table->string('agama_pasangan');
            $table->bigInteger('nik_pasangan');
            $table->string('pekerjaan_pasangan');
            $table->string('alamat_pasangan');
            $table->string('tempat_menikah');
            $table->date('tanggal_menikah');
            $table->string('mas_kawin');
            $table->string('wali_nikah');
            $table->string('nama_pelapor');
            $table->string('tempat_lahir_pelapor');
            $table->date('tanggal_lahir_pelapor');
            $table->string('agama_pelapor');
            $table->bigInteger('nik_pelapor');
            $table->string('pekerjaan_pelapor');
            $table->string('alamat_pelapor');
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
        Schema::dropIfExists('surat_keterangan_pernah_nikah');
    }
}
