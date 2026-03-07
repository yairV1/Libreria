<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        // campos para mejorar la presentación en la UI
        'color',          // color asociado a la categoría
        'icono',          // nombre/clase de icono (por ejemplo de FontAwesome)
    ];

    /**
     * Return a factory instance for the model.
     * Laravel's default would look for a class named
     * Database\Factories\categoriasFactory, but our file and class are
     * named categoriaFactory. Providing this method avoids renaming.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Database\Factories\categoriaFactory::new();
    }

    public function libros()
    {
        return $this->hasMany(libro::class, 'categoria_id');
    }
}
