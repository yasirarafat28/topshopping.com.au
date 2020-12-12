<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('content', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();

            $table->enum('type', ['about', 'contact', 'term', 'privacy', 'faq'])->default('about');
            $table->enum('status', ['active', 'pending'])->default('pending');
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
        Schema::dropIfExists('content');
    }
}
