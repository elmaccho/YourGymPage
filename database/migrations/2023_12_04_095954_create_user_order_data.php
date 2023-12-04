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
        Schema::create('user_order_data', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->string('email', 255);
            $table->string('phone_number', 20);
            $table->string('full_address', 500);
            $table->string('city', 255);
            $table->string('street', 255);
            $table->string('zip_code', 6);
    
            $table->foreignId('order_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_order_data');
    }
};
