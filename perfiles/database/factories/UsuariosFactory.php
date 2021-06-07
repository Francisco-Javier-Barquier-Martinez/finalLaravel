<?php

namespace Database\Factories;

use App\Models\Usuarios;
use App\Models\Perfiles;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuariosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuarios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $perfil = Perfiles::all('id');
        return [
            'nomusu' => $this->faker->unique()->userName(),
            'mail' => $this->faker->unique()->freeEmail(),
            'localidad' => $this->faker->streetAddress(),
            'perfiles_id' => $perfil->get(rand(0, count($perfil) - 1))
        ];
    }
}
