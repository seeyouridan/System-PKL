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
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->string('nis', 30);
            $table->string('nama', 50);
            $table->char('jenis_kelamin', 5);
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('majors')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_guru')->unsigned();
            $table->foreign('id_guru')->references('id_guru')->on('mentors')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_laporan')->unsigned();
            $table->foreign('id_laporan')->references('id_laporan')->on('reports')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
