<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_surat', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('id_jenis_surat');
            $table->enum('jenis',["Kop Surat","Isi Surat"]);
            $table->string('detail_jenis');
            $table->json('data');
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
        Schema::dropIfExists('template_surat');
    }
}
