<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeterangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_jenis');
            $table->string('nomor');
            $table->date('tanggal_surat');
            $table->bigInteger('nik');
            $table->string('nama_pemohon');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('agama');
            $table->enum('status_perkawinan',['Belum kawin','Kawin Tercatat','Kawin Belum Tercatat','Cerai hidup','Cerai mati']);
            $table->string('alamat');
            $table->string('kewarganegaraan');
            $table->string('tujuan_pembuatan');
            $table->string('status_ttd')->nullable();
            $table->string('jabatan_ttd');
            $table->string('jabatan_pengganti_ttd')->nullable();
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
        Schema::dropIfExists('surat_keterangan');
    }
}
