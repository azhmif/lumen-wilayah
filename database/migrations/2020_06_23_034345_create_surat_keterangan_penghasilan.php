<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeteranganPenghasilan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_penghasilan', function (Blueprint $table) {
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
            $table->string('golongan');

            $table->bigInteger('penghasilan');

            $table->string('status_ttd')->nullAble();
            $table->string('jabatan_ttd');
            $table->string('jabatan_pengganti_ttd')->nullAble();
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
        Schema::dropIfExists('surat_keterangan_penghasilan');
    }
}
