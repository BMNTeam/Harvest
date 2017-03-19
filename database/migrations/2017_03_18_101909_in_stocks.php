<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table)
        {
            $table -> increments('id');
            $table -> timestamps();
            $table -> integer('sort_id')->unsigned();
            $table -> integer('reproduction_id')->unsigned();
            $table -> integer('culture_id')->unsigned();
            $table -> string('vall');
            $table -> string('corns');

            $table -> foreign('sort_id')->references('id')->on('sorts');
            $table -> foreign('reproduction_id')->references('id')->on('reproductions');
            $table -> foreign('culture_id')-> references('id')->on('cultures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
