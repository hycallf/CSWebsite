<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lomba_mahasiswa', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('lomba_id');
            $table->string('mahasiswa_nim');
            $table->timestamps();

            $table->foreign('lomba_id')->references('id')->on('lomba')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lomba_mahasiswa');
    }
};
