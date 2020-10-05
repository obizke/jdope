<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('location');
            $table->string('county');
            $table->string('invoice')->unique();
            $table->unsignedInteger('user_id');
            $table->integer('item_count');
            $table->string('phone');
            $table->float('total_amount_due');
            $table->string('payment_method');
            $table->tinyInteger('payment_status')->default(0);
            $table->string('MpesaReceiptNumber')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
