<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('stock_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->float('amount_of_done');
            $table->string('status');

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
        //
    }
}
