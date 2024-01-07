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
        Schema::create('mbkm', function (Blueprint $table) {
            $table->string('id_mbkm', 100)->primary();
            $table->string('nama_mbkm', 100);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedBigInteger('tipe_mbkm')->nullable();
            $table->unsignedBigInteger('id_instansi')->nullable();
            $table->string('nim_mahasiswa', 30)->nullable();
            $table->unsignedBigInteger('id_supervisor')->nullable();
            $table->string('laporan', 255)->nullable();
            $table->string('posisi', 255);
            $table->timestamps();

            $table->foreign('tipe_mbkm')->references('id')->on('tipe_mbkm')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_instansi')->references('id')->on('instansi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_supervisor')->references('id')->on('supervisor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mbkm');
    }
};
