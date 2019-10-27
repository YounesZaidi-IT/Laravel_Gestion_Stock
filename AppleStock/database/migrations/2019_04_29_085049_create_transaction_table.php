<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('userid')->unsigned()->nullable(); 
            $table->bigInteger('productid')->unsigned()->nullable(); 
			$table->integer('total');
            $table->timestamps();
        });
        Schema::table('transaction', function($table){
        $table->foreign('userid')->references('id')->on('users');
		$table->foreign('productid')->references('id')->on('product');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}


