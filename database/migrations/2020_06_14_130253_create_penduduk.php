<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('id_kk');
            $table->string('nama');
            $table->string('alamat');
            $table->bigInteger('id_keldes');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jk',['Laki-Laki','Perempuan']);
            $table->uuid('shdk');
            $table->uuid('agama');
            $table->uuid('pendidikan_terakhir');
            $table->uuid('pekerjaan');
            $table->string('nama_ibu_kandung');
            $table->enum('status_penduduk',['KTP Beralamat di Desa Berdomisili di Desa','KTP Beralamat di Luar Desa Berdomisili di desa','KTP Beralamat di Desa Berdomisili di Luar Desa','KTP Beralamat di Luar Desa Berdomisili di Luar Desa']);
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
        Schema::dropIfExists('penduduk');
    }
}
