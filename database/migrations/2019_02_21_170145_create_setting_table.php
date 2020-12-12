<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->text('app_name')->nullable();
            $table->text('app_description' )->nullable();
            $table->text('tagline')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('admin_email')->nullable();
            $table->text('admin_phone')->nullable();
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->timestamps();
        });

        DB::table('setting')->insertGetId([
            'app_name' => 'Efashionia',
            'app_description' => 'Efashionia is the top fashion marketplace in the USA. It\'s the most popular shopping guide for fashion and cosmetics.',
            'tagline' => 'Price Compare For Shopping',
            'meta_title' => 'Efashionia | Price Comparison | Online Marketplace | Shopping Guide',
            'meta_description' => 'Efashionia is the top fashion marketplace in the USA. It\'s the most popular shopping guide for fashion and cosmetics.',
            'admin_email' => 'mkbasar101@gmail.com',
            'admin_phone' => 'Efashionia',
            'status' => 'active',


        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
