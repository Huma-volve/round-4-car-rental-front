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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2); // Amount paid
            $table->enum ('payment_method', ['credit card','paypal' ]); // Type of payment, defaulting to online
           $table-> enum ('payment_status', ['pending', 'completed', 'failed'])->default('pending'); // Status of the payment
            $table->string('currency', 3)->default('USD'); // Currency code, defaulting to USD
            $table->integer('card_number'); // Card number of the payment method
            $table->string('card_type'); // Type of card (e.g., Visa, MasterCard)
            $table->text('cvc'); // CVC code of the card
            $table->date('Expration_date'); // Date of the payment
            $table->string('card_holder_name'); // Name of the card holder
            $table->foreignId('booking_id')->constrained('bookings');

            $table->foreignId('user_id')->constrained('users'); // Foreign key to the user who made the payment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
