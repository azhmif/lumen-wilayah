<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifPerangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notif_perangkat', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_pengguna');
            $table->enum('jenis',['Pengajuan','Pengumuman'])->default('Pengajuan');
            $table->text('konten');
            $table->text('keterangan');
            $table->enum('status',['0','1'])->default('0');
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
        Schema::dropIfExists('notif_perangkat');
    }
}
