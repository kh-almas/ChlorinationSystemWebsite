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
        Schema::create('pumps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('source_identification');
            $table->string('location_of_pump');
            $table->string('dma');
            $table->string('zone');
            $table->string('year_of_installation');
            $table->string('depth');
            $table->string('chlorination_unit_condition');
            $table->string('pump_running_condition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pumps');
    }
};
