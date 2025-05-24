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
        Schema::create('tutor_validator_register', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('lastname');
            $table->string('mail');
            $table->string('phone')->nullable();
            $table->string('type'); //si esun validador o un tutor
            $table->enum('state', [
                'Pendiente', //La solicitud se ha recibido y está a la espera de ser revisada para enviar el formulario.
                'Aceptada', //La solicitud ha sido aprobada.. Cuando el Admin lo registre en el sistema
                'Rechazada', //La solicitud ha sido denegada.
                'Cancelada', //La solicitud ha sido cancelada por el centro educativo o el administrador.
                'En Proceso', //requiere algún tipo de verificación por el usuario
                'Completada' // El proceso de registro ha finalizado satisfactoriamente.Cuando el usuario entra al dashboard
            ])->default('En Proceso');
            $table->string('verification_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('verification_code')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_validator_register');
    }
};
