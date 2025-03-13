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
        Schema::create('study_centers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('activated')->default(false);
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->uuid('regional_id'); // Asegúrate de que sea UUID
            $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade'); // Cambia `id` por `tracking_code` si es necesario

            $table->uuid('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->uuid('people_id')->nullable();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->uuid('membership_id');
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_centers');
    }
};
