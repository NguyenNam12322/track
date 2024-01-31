<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('product');
            $table->text('mail');
            $table->text('name');
            $table->text('sex');
            $table->text('phone_number');
            $table->integer('province');
            $table->text('total_price');
            $table->integer('active')->default(0);
            $table->integer('user_active')->nullable();
            $table->longText('address');
            $table->longText('orderId');
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
        Schema::dropIfExists('order');
    }
}
