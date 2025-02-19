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
        Schema::create('regionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('tracking_code', 10)->change();
            $table->boolean('activated')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regionals', function (Blueprint $table) {
            // Revertir el cambio
            $table->integer('id')->change(); // Ajusta según el tipo original
        });
        Schema::dropIfExists('regionals');
    }
};
