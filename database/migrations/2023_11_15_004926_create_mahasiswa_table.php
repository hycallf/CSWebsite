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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('name');
            $table->string('angkatan');
            $table->string('notelp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('statuses');
            $table->timestamps();
        });
    }

    //867563030493844
    //867563030993843
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
