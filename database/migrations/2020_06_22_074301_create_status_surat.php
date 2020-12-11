<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_surat', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('jenis');
            $table->uuid('id_surat');
            $table->enum('status',['Diajukan','Disetujui','Ditolak']);
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
        Schema::dropIfExists('status_surat');
    }
}
