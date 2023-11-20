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
        Schema::create('mahasiswa_mbkm', function (Blueprint $table) {
            $table->string('id_mbkm', 50);
            $table->string('nim', 20)->index('nim_mahasiswambkm');
            $table->integer('id_supervisor')->index('supervisor_mahasiswambkm');
            $table->string('posisi', 50);
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->string('workplace')->nullable();

            $table->primary(['id_mbkm', 'nim']);
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
        Schema::dropIfExists('mahasiswa_mbkm');
    }
};
