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
        Schema::create('mahasiswa_publikasi', function (Blueprint $table) {
            $table->integer('id_publikasi');
            $table->string('nim', 30)->index('nim_mahasiswapublikasi');

            $table->primary(['id_publikasi', 'nim']);
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
        Schema::dropIfExists('mahasiswa_publikasi');
    }
};
