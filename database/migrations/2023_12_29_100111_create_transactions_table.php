<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('invoice')->nullable(true);
            $table->string('transaction_code')->nullable(true);
            $table->string('transaction_product_type')->nullable(true);
            $table->bigInteger('amount')->nullable(true);
            $table->date('transaction_date')->nullable(true);
            $table->string('description')->nullable(true);
            $table->enum('status', ['PENDING','CONFIRMED', 'PROCESS', 'SUCCESS', 'EXPIRED'])->default('PENDING');
            $table->string('payment_methode')->nullable(true);
            $table->string('payment_link')->nullable(true);
            $table->timestamps();


            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
