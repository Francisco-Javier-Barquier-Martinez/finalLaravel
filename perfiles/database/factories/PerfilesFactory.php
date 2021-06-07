<?php

namespace Database\Factories;

use App\Models\Perfiles;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerfilesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perfiles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->randomElement(['Admin', 'Usuario', 'Cliente', 'Gestor', 'Proveedor']),
            'descripcion' => $this->faker->text()
        ];
    }
}
