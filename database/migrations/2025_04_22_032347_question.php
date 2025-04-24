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
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->uuid('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->uuid('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->string('question');
            $table->boolean('activated')->default(true);
            $table->enum('state', [
                'Pendiente', // está a la espera de ser revisada por el validador.
                'Aceptada', //La pregunta fue aceptada por el validador
                'Rechazada', //La pregunta  ha sido denegada por el validador.
                'Cancelada', //La pregunta  ha sido cancelada por el centro educativo o el administrador.
                'En Proceso', //requiere algún tipo de verificación por el validador antes de pasar a pendiete,

            ])->default('En Proceso'); // Cambiado el valor por defecto a 'En Proceso'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
