<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKuasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_kuasa', function (Blueprint $table) {
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
            $table->bigInteger('nik2');
            $table->string('nama2');
            $table->string('tempat_lahir2');
            $table->date('tanggal_lahir2');
            $table->string('pekerjaan2');
            $table->string('alamat2');

            $table->string('kuasa_untuk');
            $table->string('kuasa_atas');
            $table->string('tujuan_kuasa');
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
        Schema::dropIfExists('surat_kuasa');
    }
}
