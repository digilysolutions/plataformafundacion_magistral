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
        Schema::create('membership_statuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique(); // Nombre del estado
            $table->text('description')->nullable(); // Descripción del estado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_statuses');
    }
};
