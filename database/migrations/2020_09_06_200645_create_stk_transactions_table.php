<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStkTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stk_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('MpesaReceiptNumber')->nullable();
            $table->string('Amount')->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->string('TransactionDate')->nullable();
            $table->string('Balance')->nullable();
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
        Schema::dropIfExists('stk_transactions');
    }
}
