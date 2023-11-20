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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('nama');
            $table->integer('angkatan');
            $table->string('notelp', 20)->nullable();
            $table->string('alamat')->nullable();
            $table->string('foto_profile')->nullable();
            $table->string('bio')->nullable();
            $table->integer('status')->index('status_statusmahasiswa');
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
        Schema::dropIfExists('mahasiswa');
    }
};
