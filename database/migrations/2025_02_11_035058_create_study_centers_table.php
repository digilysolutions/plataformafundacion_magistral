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
            $table->increments('id');
            $table->boolean('activated')->default(false);
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('tracking_code')->nullable();
            $table->integer('regional_id')->unsigned()->default();
            $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade');
            $table->integer('district_id')->unsigned()->default();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->integer('people_id')->unsigned()->default();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
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
        Schema::dropIfExists('study_centers');
    }
};
