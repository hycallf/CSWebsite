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
        Schema::table('user', function (Blueprint $table) {
            $table->foreign(['id_user'], 'user_userdosen')->references(['nidp'])->on('dosen');
            $table->foreign(['id_role'], 'user_role')->references(['id_role'])->on('role');
            $table->foreign(['id_user'], 'user_usermahasiswa')->references(['nim'])->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign('user_userdosen');
            $table->dropForeign('user_role');
            $table->dropForeign('user_usermahasiswa');
        });
    }
};
