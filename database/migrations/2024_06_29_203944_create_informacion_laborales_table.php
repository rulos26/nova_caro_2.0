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
        Schema::create('informacion_laborales', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula'); // Campo único
            $table->string('compania');
            $table->string('cargo');
            $table->date('ingreso');
            $table->date('retiro')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_laborales');
    }
};
