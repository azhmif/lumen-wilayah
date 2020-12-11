<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratUndangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_undangan', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_jenis');
            $table->uuid('id_pengaju');
            $table->string('nomor');
            $table->date('tanggal_surat');
            $table->datetime('waktu');
            $table->string('tempat');
            $table->json('acara');
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
        Schema::dropIfExists('surat_undangan');
    }
}
