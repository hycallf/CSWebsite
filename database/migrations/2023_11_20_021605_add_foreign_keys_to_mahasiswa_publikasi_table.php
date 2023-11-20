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
        Schema::table('mahasiswa_publikasi', function (Blueprint $table) {
            $table->foreign(['id_publikasi'], 'publikasi_mahasiswapublikasi')->references(['id_publikasi'])->on('publikasi');
            $table->foreign(['nim'], 'nim_mahasiswapublikasi')->references(['nim'])->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa_publikasi', function (Blueprint $table) {
            $table->dropForeign('publikasi_mahasiswapublikasi');
            $table->dropForeign('nim_mahasiswapublikasi');
        });
    }
};
