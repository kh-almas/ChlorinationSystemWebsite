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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pump_id');
            $table->string('running_status');
            $table->string('water_production')->nullable();
            $table->string('free_residual_chlorine')->nullable();
            $table->string('total_residual_chlorine')->nullable();
            $table->string('combined_residual_chlorine')->nullable();
            $table->string('test_time');
            $table->string('test_date');
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
            $table->foreign('pump_id')->references('id')->on('pumps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
