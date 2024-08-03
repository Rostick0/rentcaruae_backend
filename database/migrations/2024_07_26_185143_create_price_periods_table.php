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
        Schema::create('price_periods', function (Blueprint $table) {
            $table->id();
            $table->float('price')->default(0);
            $table->float('mileage')->nullable();
            $table->string('type'); // price leasing_options security_deposit free_per_day_security
            $table->integer('period')->nullable();
            $table->boolean('is_show')->default(1);
            $table->foreignId('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_periods');
    }
};
