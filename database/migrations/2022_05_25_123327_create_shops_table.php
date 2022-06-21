<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->longText('logo');
            $table->string('shop_name');
            $table->longText('cover_image');
            $table->string('owner_name');
            $table->integer('products')->nullable();
            $table->integer('orders')->nullable();
            $table->string('status');
            $table->string('description');
            $table->string('account_holder_name');
            $table->string('account_holder_email');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('address');
            $table->string('phone');
            $table->string('website');
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
        Schema::dropIfExists('shops');
    }
}
