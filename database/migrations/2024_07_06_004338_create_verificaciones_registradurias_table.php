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
        Schema::create('verificaciones_registradurias', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula');
            $table->string('verificacion');
            $table->unsignedBigInteger('id_registraduria');
            $table->boolean('verificado');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificaciones_registradurias');
    }
};
