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
            $table->integer('id_siswa')->unsigned();
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('kode_latitude', 50);
            $table->string('kode_longtitude', 50);
            $table->text('jurnal_kegiatan');
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
