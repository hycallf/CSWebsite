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
        Schema::table('dosen_publikasi', function (Blueprint $table) {
            $table->foreign(['id_publikasi'], 'publikasi_dosenpublikasi')->references(['id_publikasi'])->on('publikasi');
            $table->foreign(['nidp'], 'nidp_dosenpublikasi')->references(['nidp'])->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dosen_publikasi', function (Blueprint $table) {
            $table->dropForeign('publikasi_dosenpublikasi');
            $table->dropForeign('nidp_dosenpublikasi');
        });
    }
};
