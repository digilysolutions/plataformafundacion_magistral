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
                $table->foreign('membership_feature_id')->references('id')->on('membership_features')->onDelete('cascade');
                $table->string('value')->nullable();
                $table->string('description');
                $table->integer('usage_limit')->nullable(); // Límite de uso
                $table->integer('current_usage')->nullable()->default(0);
                $table->boolean('has_access');
                $table->string('url');
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
