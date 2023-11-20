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
        Schema::create('dosen_publikasi', function (Blueprint $table) {
            $table->integer('id_publikasi');
            $table->string('nidp', 30)->index('nidp_dosenpublikasi');

            $table->primary(['id_publikasi', 'nidp']);
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
        Schema::dropIfExists('dosen_publikasi');
    }
};
