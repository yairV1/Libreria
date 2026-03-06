<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\categorias;
use App\Models\libro;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        categorias::factory()
            ->count(10)
            ->has(libro::factory()->count(50), 'libros')
            ->create();
    }
}