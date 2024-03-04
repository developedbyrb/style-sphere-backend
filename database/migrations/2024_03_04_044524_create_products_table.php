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
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->foreignId('category_id')->constrained();
            $table->longText('description');
            $table->string('tags');
            $table->decimal('purchase_price', 8, 2)->nullable();
            $table->decimal('selling_price', 8, 2)->nullable();
            $table->foreignId('created_by')->constrained();
            $table->enum('status', ['active', 'inactive', 'out_of_stock']);
            $table->boolean('is_in_stock');
            $table->integer('current_stock_qty');
            $table->integer('low_stock_alert_qty')->nullable();
            $table->integer('is_in_low_stock');
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
