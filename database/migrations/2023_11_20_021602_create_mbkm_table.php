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
            $table->integer('tipe_mbkm')->index('mbkm_tipembkm');
            $table->integer('id_instansi')->index('mbkm_instansi');
            $table->string('nama_mbkm', 100);
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
        Schema::dropIfExists('mbkm');
    }
};
