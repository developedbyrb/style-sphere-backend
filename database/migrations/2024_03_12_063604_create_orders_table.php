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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('email');
            $table->string('name');
            $table->string('order_date');
            $table->string('order_number');
            $table->string('order_status');
            $table->date('order_processed_date');
            $table->string('total_amount');
            $table->foreignId('shipping_address_id')->constrained();
            $table->boolean('is_cancel')->default(false);
            $table->string('cancel_reason')->nullable();
            $table->enum('cancel_by', ['admin', 'vendor', 'customer'])->nullable();
            $table->enum('payment_status', ['completed', 'pending', 'failed']);
            $table->enum('status', ['placement', 'processing', 'shipping', 'delivered', 'return']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
