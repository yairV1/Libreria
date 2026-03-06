<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LibroSeeder::class);

        // create a sample libro so the seeder works correctly.
        $cat = \App\Models\categorias::factory()->create();
        \App\Models\libro::factory()->create([
            'titulo' => 'Test Book',
            'autor' => 'Test Author',
            'anio_publicacion' => '2024-01-01',
            'isbn' => '1234567890123',
            'categoria_id' => $cat->id,
            'cantidad_disponible' => 100,
        ]);
    }
}
