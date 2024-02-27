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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('father_name')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gander')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('phone_no_one')->nullable();
            $table->string('phone_no_two')->nullable();
            $table->string('present_address')->nullable();
            $table->string('	permanent_address')->nullable();
//            $table->string('	image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
