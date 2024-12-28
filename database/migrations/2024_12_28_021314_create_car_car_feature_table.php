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
        Schema::create('car_car_feature', function (Blueprint $table) {
            $table->id();
            // IMPORTANT-COLUMNS
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->foreignId('feature_id')->constrained('car_features')->onDelete('cascade');
            // IMPORTANT-COLUMNS
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_car_features');
    }
};
