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
        Schema::create('publikasi_dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publikasi_id');
            $table->string('dosen_nidp');
            $table->timestamps();

            $table->foreign('publikasi_id')->references('id')->on('publikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dosen_nidp')->references('nidp')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasi_dosen');
    }
};
