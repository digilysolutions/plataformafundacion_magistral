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
        Schema::create('districts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('activated')->nullable()->default(false);
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->uuid('regional_id'); // Asegúrate de que sea UUID
            $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade'); // Cambia `id` por `tracking_code` si es necesario

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('districts');
    }
};
