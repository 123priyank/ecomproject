<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_attr', function (Blueprint $table) {
            //
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->foreignId('color_id')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_attr', function (Blueprint $table) {
            //
            $table->dropColumn(['product_id',  'size_id', 'color_id']);
        });
    }
};
