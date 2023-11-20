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
        Schema::table('peserta_lomba', function (Blueprint $table) {
            $table->foreign(['nim'], 'nim_pesertalomba')->references(['nim'])->on('mahasiswa');
            $table->foreign(['id_lomba'], 'lomba_pesertalomba')->references(['id_lomba'])->on('lomba');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peserta_lomba', function (Blueprint $table) {
            $table->dropForeign('nim_pesertalomba');
            $table->dropForeign('lomba_pesertalomba');
        });
    }
};
