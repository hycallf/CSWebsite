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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->integer('id_publikasi', true);
            $table->string('judul', 200);
            $table->string('jurnal', 100);
            $table->string('penerbit', 100)->nullable();
            $table->string('volume_no', 50)->nullable();
            $table->date('tanggal_terbit');
            $table->string('halaman', 20)->nullable();
            $table->string('url')->nullable();
            $table->string('sk')->nullable();
            $table->string('foto_kegiatan')->nullable();
            $table->string('surat_tugas')->nullable();
            $table->string('laporan_akademik')->nullable();
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
        Schema::dropIfExists('publikasi');
    }
};
