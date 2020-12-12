<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('phone')->nullable();
            $table->char('url')->nullable();
            $table->char('photo')->nullable();
            $table->text('overview')->nullable();
            $table->text('logo')->nullable();
            $table->text('city')->nullable();
            $table->text('street')->nullable();
            $table->text('state')->nullable();
            $table->text('country')->nullable();
            $table->text('zipcode')->nullable();
            $table->text('comment')->nullable();
            $table->text('type')->nullable();
            $table->enum('status', ['active', 'pending', 'suspend'])->default('pending');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
