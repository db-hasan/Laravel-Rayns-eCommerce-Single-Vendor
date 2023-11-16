<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('category_id',50)->nullable();
            $table->string('sub_category',50)->nullable();
            $table->string('brand_id',50)->nullable();
            $table->string('unit_id',50)->nullable();
            $table->string('color_id',50)->nullable();
            $table->string('product_name',50)->nullable();
            $table->string('product_des',255)->nullable();
            $table->string('img_id',50)->nullable();
            $table->integer('product_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
