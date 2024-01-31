<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Name');
            $table->text('Image');
            $table->text('ProductSku');
            $table->text('Price');
            $table->text('Link');
            $table->longText('Detail');
            $table->longText('Salient_Features');
            $table->longText('Specifications');
            $table->integer('Quantily');
            $table->text('Maker');
            $table->text('Group');
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
        Schema::drop('products');
    }
}
