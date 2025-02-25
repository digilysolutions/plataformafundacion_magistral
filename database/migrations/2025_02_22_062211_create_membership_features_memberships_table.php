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
        Schema::create('membership_features_memberships', function (Blueprint $table) {
            $table->id();
            $table->uuid('membership_id');
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');
            $table->uuid('membership_feature_id');
            $table->foreign('membership_id')->references('id')->on('membership_features')->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_features_memberships');
    }
};
