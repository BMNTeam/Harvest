<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultipleUsersFunctionality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock', function (Blueprint $table) {

            $table -> integer('user_id')->unsigned();

            $table -> foreign('user_id')->references('id')->on('users');
        });

        Schema::table('order', function (Blueprint $table) {

            $table -> integer('user_id')->unsigned();

            $table -> foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock', function (Blueprint $table) {

            $table -> dropColumn('user_id');
        });

        Schema::table('order', function (Blueprint $table) {

            $table -> dropColumn('user_id');
        });
    }
}
