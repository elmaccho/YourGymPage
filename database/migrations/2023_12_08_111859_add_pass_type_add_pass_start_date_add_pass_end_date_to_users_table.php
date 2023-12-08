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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('pass_type_id')->nullable()->after('phone_number');
            $table->foreign('pass_type_id')->references('id')->on('pass_types');
            $table->date('pass_start_date')->nullable()->after('pass_type_id');
            $table->date('pass_end_date')->nullable()->after('pass_start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['pass_type_id']);
            $table->dropColumn(['pass_type_id', 'pass_start_date', 'pass_end_date']);
        });
    }
};
