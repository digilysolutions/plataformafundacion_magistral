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
            $table->increments('id');
            $table->boolean('activated')->default(false);
            $table->string('name');
            $table->string('tracking_code', 10)->change();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->integer('regional_id')->unsigned()->default();
            $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('districts', function (Blueprint $table) {
            // Revertir el cambio
            $table->integer('tracking_code')->change(); // Ajusta según el tipo original
        });
        Schema::dropIfExists('districts');
    }
};
