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
        Schema::create('company_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('week_day');
            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->boolean('is_show')->default(0);
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_schedules');
    }
};
