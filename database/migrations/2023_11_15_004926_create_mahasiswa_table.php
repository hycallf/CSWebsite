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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id('mahasiswa_id');
            $table->string('nim')->unique();
            $table->string('name');
            $table->string('angkatan');
            $table->string('notelp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            // $table->foreignId('status_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    //867563030493844
    //867563030993843
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
