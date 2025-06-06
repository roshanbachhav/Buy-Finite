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
        Schema::table('orders', function (Blueprint $table) {
            // Modify the 'subtotal' and 'others_tax' columns to 'decimal'
            $table->decimal('subtotal', 10, 2)->change();
            $table->decimal('others_tax', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Revert the changes if rolled back
            $table->double('subtotal')->change();
            $table->double('others_tax')->change();
        });
    }
};