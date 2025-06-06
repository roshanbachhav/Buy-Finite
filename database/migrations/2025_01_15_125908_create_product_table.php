<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('description');
            $table->integer('off');
            $table->integer('listPrice');
            $table->integer('ourPrice');
            $table->string('productImage')->nullable();
            $table->boolean('featured')->default(0);
            $table->integer('starRating');


            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


            // $table->unsignedBigInteger('subcategory_id');
            // $table->foreign('subcategory_id')->references('id')->on('subcategory')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};