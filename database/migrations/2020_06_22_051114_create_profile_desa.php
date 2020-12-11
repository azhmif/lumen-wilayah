<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_desa', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->bigInteger('id_keldes');
            $table->text('foto_desa');
            $table->string('alamat_desa');
            $table->string('notelp');
            $table->string('fax');
            $table->string('email');
            $table->string('website');
            $table->string('kode_pos');
            $table->string('batas_utara');
            $table->string('batas_barat');
            $table->string('batas_timur');
            $table->string('batas_selatan');
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
        Schema::dropIfExists('profile_desa');
    }
}
