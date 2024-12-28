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
            // IMPORTANT-COLUMNS
            $table->string('model_name');
            $table->foreignId('brand_id')->constrained('car_brands')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('car_types')->onDelete('cascade');
            $table->year('production_year')->nullable();
            $table->string('color')->nullable();
            $table->string('engine_type')->nullable();
            $table->integer('horsepower')->nullable();
            $table->integer('torque')->nullable();
            $table->string('transmission')->nullable();
            $table->decimal('fuel_consumption', 5, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            // IMPORTANT-COLUMNS
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
