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
            $table->string('title');
            $table->boolean('is_show');
            $table->boolean('is_new');
            $table->boolean('is_luxury');
            $table->integer('seats');
            $table->float('security_deposit')->nullable();
            $table->float('deposit_free_per_day')->nullable();
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('model_car_id')->references('id')->on('model_cars')->onDelete('cascade');
            $table->foreignId('type_car_id')->references('id')->on('type_cars')->onDelete('cascade');
            $table->foreignId('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');
            $table->foreignId('transmission_id')->references('id')->on('transmissions')->onDelete('cascade');
            $table->foreignId('colour_id')->references('id')->on('colours')->onDelete('cascade');
            $table->foreignId('colour_interior_id')->references('id')->on('colours')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
