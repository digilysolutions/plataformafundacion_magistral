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
        Schema::create('items_pisa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('code', 255)->unique(); // Ejemplo: PISA-2022-MAT-CANT-2-015
            $table->year('year'); // Año del ítem
            $table->text('question');
            $table->boolean('activated')->default(true);
            $table->enum('state', [
                'Pendiente', // está a la espera de ser revisada por el validador.
                'Aceptada', //La pregunta fue aceptada por el validador
                'Rechazada', //La pregunta  ha sido denegada por el validador.
                'Cancelada', //La pregunta  ha sido cancelada por el centro educativo o el administrador.
                'En Proceso', //requiere algún tipo de verificación por el validador antes de pasar a pendiete,

            ])->default('En Proceso'); // Cambiado el valor por defecto a 'En Proceso'
            $table->text('resource')->nullable(); // Recursos (URL o descripción)
            $table->text('ai_help')->nullable(); // Ayuda IA

            $table->uuid('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->uuid('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->uuid('sublevel_id')->nullable();
            $table->foreign('sublevel_id')->references('id')->on('sublevels')->onDelete('cascade');
            $table->uuid('content_id');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
