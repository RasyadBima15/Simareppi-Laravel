<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('tanggal_surat');
            $table->string('perihal');
            $table->string('dari');
            $table->string('kepada');
            $table->enum('jenis_surat', ['Surat Biasa', 'TR', 'Nota Dinas']);
            $table->longText('isi_surat');
            $table->longText('disposisi_kapolda');
            $table->longText('disposisi_karo_sdm');
            $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuks');
    }
};
