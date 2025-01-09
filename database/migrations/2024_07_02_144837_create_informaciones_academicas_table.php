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
        Schema::create('informaciones_academicas', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula'); // Campo único
            $table->string('institucion');
            $table->string('titulo_programa');
            $table->date('fecha_de_grado');
            $table->string('telefono');
            $table->unsignedBigInteger('id_ciudad_academica');
            $table->foreign('id_ciudad_academica')->references('id')->on('municipios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informaciones_academicas');
    }
};
