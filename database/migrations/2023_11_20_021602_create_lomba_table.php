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
        Schema::create('lomba', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('penyelenggara', 50);
            $table->date('waktu_pelaksanaan');
            $table->enum('tingkat_pengakuan', ['internasional', 'nasional', 'provinsi', 'wilayah']);
            $table->string('capaian_prestasi', 50);
            $table->string('foto_kegiatan', 50);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('lomba');
    }
};
