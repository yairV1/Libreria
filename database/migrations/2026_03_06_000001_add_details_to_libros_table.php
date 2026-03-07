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
        Schema::table('libros', function (Blueprint $table) {
            // detalles opcionales para cada libro
            $table->text('sinopsis')->nullable()->after('cantidad_disponible');
            $table->string('portada')->nullable()->after('sinopsis');
            $table->string('editorial')->nullable()->after('portada');
            $table->integer('numero_paginas')->nullable()->after('editorial');

            // índices para acelerar búsquedas frecuentes
            $table->index('categoria_id');
            $table->unique('isbn'); // si no estaba definido en la migración original

            // forzar clave foránea si aún no existe
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropIndex(['categoria_id']);
            $table->dropUnique('libros_isbn_unique');

            $table->dropColumn(['sinopsis', 'portada', 'editorial', 'numero_paginas']);
        });
    }
};