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
        Schema::create('sublevels', function (Blueprint $table) {
          $table->uuid('id')->primary();
            $table->boolean('activated')->default(false);
            $table->string('name');
            $table->string('description')->nullable();
              $table->uuid('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sublevels');
    }
};
