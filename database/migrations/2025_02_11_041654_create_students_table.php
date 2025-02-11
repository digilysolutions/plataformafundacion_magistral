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
            $table->id();
            $table->boolean('activated')->default(false);
            $table->integer('people_id')->unsigned()->default();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->string('course')->nullable();
            $table->integer('studycenters_id')->unsigned()->default();
            $table->foreign('studycenters_id')->references('id')->on('study_centers')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->default();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('membership_id')->unsigned()->default();
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
