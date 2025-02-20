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
        Schema::create('memberships', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('activated')->default(false);
            $table->string('name');
            $table->double('price')->default(0);
            $table->integer('duration_days')->nullable(); //Duración de la membresía en días (ej: 30, 365, null para ilimitado)
            $table->date('start_date')->nullable(); // Fecha de inicio
            $table->date('end_date')->nullable(); // Fecha final
            $table->string('type')->nullable();//Membresía Tipo I Membresía Tipo II Membresía Tipo III, Membresía Tipo X
            $table->boolean('is_studio_center')->nullable();//ipo de membresía (ej: 'centro_estudio', 'usuario_normal')
            $table->integer('student_limit')->nullable();//Límite de estudiantes permitidos (solo aplica para 'centro_estudio')
            $table->integer('limite_items')->nullable();//Límite de ítems accesibles (ej: cantidad de preguntas y respuestas)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
