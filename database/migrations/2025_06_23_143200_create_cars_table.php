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
        Schema::create('cars', function (Blueprint $table) {
                $table->id();
                $table->string('carModel');
                $table->string('gasoline');
                $table->enum('steering',['manual','automatic']);
                $table->decimal('rental_price_per_day', 8, 2);
                $table->string('TypeCar');
                $table->integer('Capacity');
                $table->string('image')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
