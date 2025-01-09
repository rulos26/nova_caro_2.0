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
        Schema::create('aspirantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->integer('cedula')->unique(); // Campo único
            $table->unsignedBigInteger('id_lugar_expedicion');
            $table->foreign('id_lugar_expedicion')->references('id')->on('municipios')->onDelete('cascade');
            $table->integer('dia_nacimiento');
            $table->integer('mes_nacimiento');
            $table->integer('año_nacimiento');
            $table->unsignedBigInteger('id_lugar_nacimiento');
            $table->foreign('id_lugar_nacimiento')->references('id')->on('municipios')->onDelete('cascade');
            $table->integer('edad');
            $table->string('direccion');
            $table->string('barrio');
            $table->unsignedBigInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id')->on('municipios')->onDelete('cascade');
            $table->string('telefono_fijo')->nullable();
            $table->string('móvil')->nullable();
            $table->string('cargo');
            $table->date('desde')->nullable();
            $table->date('hasta')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirantes');
    }
};
