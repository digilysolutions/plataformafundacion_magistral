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
        Schema::create('notifications_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->uuid('validator_id')->nullable();  // Almacena el ID del validador
            $table->uuid('tutor_id')->nullable();  // Almacena el ID del tutor
            $table->uuid('student_id')->nullable();  // Almacena el ID del estudiante
            $table->uuid('study_center_id')->nullable();  // Almacena el ID del centro de educativo
            $table->string('action'); // Accion a mostrar en la notificacion
            $table->boolean('is_read')->default(false);  // Indica si la notificación fue leída
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications_question');
    }
};
