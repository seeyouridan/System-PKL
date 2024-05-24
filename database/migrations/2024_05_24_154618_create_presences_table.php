<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->increments('id_presensi');
            $table->date('tanggal');
            $table->integer('id_latitude')->unsigned();
            $table->foreign('id_latitude')->references('id_latitude')->on('latitudes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_longtitude')->unsigned();
            $table->foreign('id_longtitude')->references('id_longtitude')->on('longtitudes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_jurnal_kegiatan')->unsigned();
            $table->foreign('id_jurnal_kegiatan')->references('id_jurnal_kegiatan')->on('informations')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id_siswa')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
