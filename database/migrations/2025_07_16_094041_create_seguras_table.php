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
        Schema::create('seguras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo_seguridad', ['PUBLICA', 'PRIVADA']);
            $table->double('radio'); // en metros
            $table->double('latitud', 10, 7);  // coordenada central
            $table->double('longitud', 10, 7); // coordenada central
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguras');
    }
};
