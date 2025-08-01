<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Slider;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        if (Slider::count() === 0) {
            Slider::insert([
                [
                    'title' => 'Imagen Ejemplo 1',
                    'image_path' => 'images/slider1.png',
                    'order' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Imagen Ejemplo 2',
                    'image_path' => 'images/slider2.png',
                    'order' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Imagen Ejemplo 3',
                    'image_path' => 'images/slider3.png',
                    'order' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
