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
        Schema::create('instances', function (Blueprint $table) {
            $table->increments('id_instansi');
            $table->string('kode_instansi', 30);
            $table->string('nama_instansi', 255);
            $table->integer('kuota');
            $table->text('alamat');
            $table->integer('id_kota')->unsigned();
            $table->foreign('id_kota')->references('id_kota')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_pkl')->unsigned();
            $table->foreign('id_pkl')->references('id_pkl')->on('pkls')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instances');
    }
};
