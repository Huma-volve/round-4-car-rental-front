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
        Schema::create('bookings', function (Blueprint $table) {
              $table->id();

            $table->date('pickup_date');
            $table->date('pickup_time');
            $table->date('dropoff_date');
            $table->date('dropoff_time');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending'); // e.g., pending, confirmed, cancelled
            $table->string('pickup_location');
            $table->string('dropoff_location');
             $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
