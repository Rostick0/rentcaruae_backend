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
            $table->boolean('is_new')->default(0);
            $table->boolean('is_luxury')->default(0);
            $table->boolean('is_deposite')->default(0);
            $table->boolean('is_special')->default(0);
            $table->year('year');
            $table->integer('seats');
            $table->integer('min_days')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('generation_id')->references('id')->on('generations')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('type_car_id')->references('id')->on('type_cars')->onDelete('cascade');
            $table->foreignId('transmission_id')->references('id')->on('transmissions')->onDelete('cascade');
            $table->foreignId('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');
            $table->foreignId('colour_id')->references('id')->on('colours')->onDelete('cascade');
            $table->foreignId('colorinterior_id')->references('id')->on('colours')->onDelete('cascade');
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
