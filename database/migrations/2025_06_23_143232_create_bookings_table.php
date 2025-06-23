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
              $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
              $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
              $table->string('pickup_location');
              $table->date('pickup_date');
              $table->time('pick_up_time');
              $table->string('dropoff_location');
              $table->date('dropoff_date');
              $table->time('dropoff_time');
              $table->string('status')->default('pending');
              $table->decimal('price', 10, 2);
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
