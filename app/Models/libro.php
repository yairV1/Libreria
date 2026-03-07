<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'anio_publicacion',
        'isbn',
        'categoria_id',
        'cantidad_disponible',
        // nuevos campos para detalles del libro
        'sinopsis',
        'portada',        // URL o ruta de la imagen de portada
        'editorial',
        'numero_paginas',
    ];

    // relacion de muchos a uno con categorias
    public function categoria()
    {
        return $this->belongsTo(categorias::class);
    }
}