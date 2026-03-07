<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\categorias;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\categorias>
 */
class categoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    protected $model = categorias::class ;

    public function definition(): array
    {
        $categorias = [
            'Acción', 'Aventura', 'Ciencia Ficción', 'Comedia', 'Drama',
            'Terror', 'Suspense', 'Romance', 'Animación', 'Documental',
            'Fantasía', 'Crimen', 'Misterio', 'Musical', 'Western'
        ];

        return [
            'nombre' => $this->faker->randomElement($categorias),
            'descripcion' => $this->faker->sentence(),
            'estado' => $this->faker->boolean(80),

            // extras visuales
            'color' => $this->faker->hexColor(),
            'icono' => $this->faker->randomElement(['fa-book','fa-film','fa-music','fa-star','fa-heart','fa-book-reader']),
        ];
    }
}
