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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('activated')->default(false);
            $table->string('name')->nullable();

            $table->uuid('people_id');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->uuid('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->uuid('studycenters_id')->nullable();
            $table->foreign('studycenters_id')->references('id')->on('study_centers')->onDelete('cascade');

            $table->uuid('membership_id')->nullable();
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
