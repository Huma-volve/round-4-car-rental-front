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
            $table->string('car_model');
            $table->string('gas_type')->nullable();
            $table->string('steering')->nullable();
            $table->decimal('rental_price_per_day', 10, 2)->nullable();
            $table->string('car_image')->nullable();
            $table->string('car_type')->nullable();
            $table->string('capacity')->nullable();

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
