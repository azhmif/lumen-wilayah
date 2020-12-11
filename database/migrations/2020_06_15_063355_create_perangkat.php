<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perangkat', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_jabatan_perangkat');
            $table->bigInteger('nik');
            $table->string('nip');
            $table->enum('status_pegawai',['PNS','NON PNS']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->smallInteger('status');
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
        Schema::dropIfExists('perangkat');
    }
}
