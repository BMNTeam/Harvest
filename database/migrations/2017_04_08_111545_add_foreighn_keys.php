<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeighnKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock', function (Blueprint $table) {

            $table -> integer('sort_id')->unsigned();
            $table -> integer('reproduction_id')->unsigned();
            $table -> integer('culture_id')->unsigned();

            $table -> foreign('sort_id')->references('id')->on('sorts');
            $table -> foreign('reproduction_id')->references('id')->on('reproductions');
            $table -> foreign('culture_id')-> references('id')->on('cultures');

        });

        Schema::table('order', function (Blueprint $table) {

            $table->integer('stock_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            $table -> foreign('customer_id')->references('id')->on('customers');
            $table -> foreign('stock_id')->references('id')->on('stock');

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

            $table->dropColumn('stock_id');
            $table->dropColumn('customer_id');

        });

        Schema::table('stock', function (Blueprint $table) {

            $table -> dropColumn('sort_id');
            $table -> dropColumn('reproduction_id');
            $table -> dropColumn('culture_id');

        });
    }
}
