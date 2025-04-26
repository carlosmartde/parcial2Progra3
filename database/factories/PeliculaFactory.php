<?php

namespace Database\Factories;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeliculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelicula::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'genero' => $this->faker->randomElement(['Terror', 'Acción', 'Infantiles', 'Comedia', 'Drama', 'Ciencia Ficción', 'Romance']),
            'puntuacion' => $this->faker->randomFloat(1, 0, 10),
            'actor_principal' => $this->faker->name(),
            'actor_secundario' => $this->faker->name(),
            'fecha_publicacion' => $this->faker->date(),
        ];
    }
}