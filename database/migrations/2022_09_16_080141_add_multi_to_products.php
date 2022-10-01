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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('lead_time');
            $table->string('tax');
            $table->string('tax_type');
            $table->integer('is_promo');
            $table->integer('is_featured');
            $table->integer('is_discounted');
            $table->integer('is_tranding');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn(['lead_time',  'tax', 'tax_type','is_promo','is_featured','is_discounted','is_tranding']);
        });
    }
};
