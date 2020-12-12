<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('merchant_id')->default(0);
            $table->text('title')->nullable();
            $table->text('url')->nullable();
            $table->text('ref')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('sku')->nullable();
            $table->text('model')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('tags')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status', ['active','suspend', 'inactive', 'pending'])->default('pending');
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
        Schema::dropIfExists('products');
    }
}
