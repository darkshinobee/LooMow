<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('buy_temps', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('customer_id');
             $table->integer('price');
             $table->integer('resultant_voucher');
             $table->integer('key');
             $table->string('status');
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
         Schema::dropIfExists('buy_temps');
     }
}
