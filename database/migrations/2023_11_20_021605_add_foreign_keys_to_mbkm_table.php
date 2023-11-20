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
        Schema::table('mbkm', function (Blueprint $table) {
            $table->foreign(['tipe_mbkm'], 'mbkm_tipembkm')->references(['id_tipembkm'])->on('tipe_mbkm');
            $table->foreign(['id_instansi'], 'mbkm_instansi')->references(['id_instansi'])->on('instansi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mbkm', function (Blueprint $table) {
            $table->dropForeign('mbkm_tipembkm');
            $table->dropForeign('mbkm_instansi');
        });
    }
};
