<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearModelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('categories', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->text('description');
           $table->timestamps();

       });
       Schema::create('products', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->text('description');
           $table->decimal('price', 8, 2);
           $table->integer('category_id')->unsigned();
           $table->timestamps();

           $table->foreign('category_id')->references('id')->on('categories');
       });
       Schema::create('users', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('email')->unique();
           $table->string('password');
           $table->string('type')->default("customer");
           $table->string('phone')->nullable();
           $table->text('addresses');
           $table->rememberToken();
           $table->timestamps();
       });
       Schema::create('orders', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('user_id')->unsigned();
           $table->text('status');
           $table->timestamps();

           $table->foreign('user_id')->references('id')->on('users');
       });
       Schema::create('order_products', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('order_id')->unsigned();
           $table->integer('product_id')->unsigned();
           $table->integer('qty');
           $table->timestamps();

           $table->foreign('order_id')->references('id')->on('orders');
           $table->foreign('product_id')->references('id')->on('products');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('categories');
      Schema::dropIfExists('products');
      Schema::dropIfExists('users');
      Schema::dropIfExists('orders');
      Schema::dropIfExists('order_products');

    }
}
