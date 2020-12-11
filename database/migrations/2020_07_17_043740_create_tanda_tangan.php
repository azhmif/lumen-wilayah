<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTandaTangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanda_tangan', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('jabatan');
            $table->string('jabatan_pengganti')->nullable();
            $table->string('nama');
            $table->string('nama_penganti')->nullable();
            $table->string('nip');
            $table->string('nip_pengganti')->nullable();
            $table->enum('status',['An.','Plt.','Plh.'])->nullable();
            $table->enum('aktif',['0','1'])->nullable();
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
        Schema::dropIfExists('tanda_tangan');
    }
}
