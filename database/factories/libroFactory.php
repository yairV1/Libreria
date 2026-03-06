<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\libro;
use App\Models\categorias;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\libro>
 */
class libroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = libro::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'autor' => $this->faker->name(),
            'anio_publicacion' => $this->faker->date('Y-m-d'),
            'isbn' => $this->faker->isbn13(),
            // either associate with an existing category or create a new one
            'categoria_id' => categorias::factory(),
            'cantidad_disponible' => $this->faker->numberBetween(1, 100),
        ];
    }
}
