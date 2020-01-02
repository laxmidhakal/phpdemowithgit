<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned(); // fk to items
            $table->foreign('item_id')->references('id')->on('items');
            $table->string('date');
            $table->string('net_sale_price');
            $table->integer('customer_id')->unsigned(); // fk to customers
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('is_paid')->default(1);
            $table->integer('created_by')->unsigned(); // fk to users
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('sales');
    }
}
