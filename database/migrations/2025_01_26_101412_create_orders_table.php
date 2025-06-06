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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->double('subtotal');
            $table->double('others_tax');
            $table->decimal('total_amount', 10, 2);
            // $table->double('coupon')->nullable();
            $table->double('discount')->nullable();
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->text('house');
            $table->string('city');
            $table->foreignId('states_id')->constrained()->onDelete('cascade');
            $table->integer('zipcode');
            $table->enum('status', ['pending', 'processing', 'completed', 'canceled', 'shipped', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};