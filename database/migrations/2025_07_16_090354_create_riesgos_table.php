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
        Schema::create('riesgos', function (Blueprint $table) {
             $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('nivel_riesgo', ['bajo', 'medio', 'alto']);

            // Coordenadas del polígono (4 vértices)
            $table->decimal('latitud1', 10, 7);
            $table->decimal('longitud1', 10, 7);
            $table->decimal('latitud2', 10, 7);
            $table->decimal('longitud2', 10, 7);
            $table->decimal('latitud3', 10, 7);
            $table->decimal('longitud3', 10, 7);
            $table->decimal('latitud4', 10, 7);
            $table->decimal('longitud4', 10, 7);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riesgos');
    }
};
