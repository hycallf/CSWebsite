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
        Schema::create('peserta_lomba', function (Blueprint $table) {
            $table->integer('id_lomba');
            $table->string('nim', 30)->index('nim_pesertalomba');
            $table->primary(['id_lomba', 'nim']);
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
        Schema::dropIfExists('peserta_lomba');
    }
};
