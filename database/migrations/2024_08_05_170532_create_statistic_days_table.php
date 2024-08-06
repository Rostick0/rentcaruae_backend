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
        Schema::create('statistic_days', function (Blueprint $table) {
            $table->id();
            $table->integer('count')->default(0);
            $table->date('date');
            $table->enum('type', ['count_refreshes', 'count_special_offers', 'count_views', 'count_booking', 'count_whatsapp']);
            $table->foreignId('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic_days');
    }
};
