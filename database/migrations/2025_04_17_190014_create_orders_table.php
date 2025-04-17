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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
             $table->string('name');
             $table->string('email');
             $table->string('phone');
             $table->string('address');


            $table->integer('quantity')->default(1);
            $table->string('price');
            $table->string('status')->default('PENDING');

            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('unpaid');
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('stripe_charge_id')->nullable();
            $table->string('stripe_receipt_url')->nullable();
            $table->string('stripe_status')->nullable();
            $table->text('stripe_error_message')->nullable();
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
