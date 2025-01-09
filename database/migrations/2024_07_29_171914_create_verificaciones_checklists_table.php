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
        Schema::create('verificaciones_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cedula');
            $table->boolean('verificacion_1')->default(0);
            $table->boolean('verificacion_2')->default(0);
            $table->boolean('verificacion_3')->default(0);
            $table->boolean('verificacion_final')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificaciones_checklists');
    }
};
