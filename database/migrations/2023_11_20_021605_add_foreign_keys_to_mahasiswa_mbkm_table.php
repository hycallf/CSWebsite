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
        Schema::table('mahasiswa_mbkm', function (Blueprint $table) {
            $table->foreign(['nim'], 'nim_mahasiswambkm')->references(['nim'])->on('mahasiswa');
            $table->foreign(['id_mbkm'], 'mbkm_mahasiswambkm')->references(['id_mbkm'])->on('mbkm');
            $table->foreign(['id_supervisor'], 'supervisor_mahasiswambkm')->references(['id_supervisor'])->on('supervisor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa_mbkm', function (Blueprint $table) {
            $table->dropForeign('nim_mahasiswambkm');
            $table->dropForeign('mbkm_mahasiswambkm');
            $table->dropForeign('supervisor_mahasiswambkm');
        });
    }
};
