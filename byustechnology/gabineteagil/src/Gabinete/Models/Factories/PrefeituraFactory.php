<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Prefeitura;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrefeituraFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prefeitura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cidade = $this->faker->city();
        $estado = $this->faker->stateAbbr();

        return [
            'codigo' => Str::upper($this->faker->unique()->bothify('##-####')), 
            'titulo' => 'Prefeitura de ' . $cidade . '/' . $estado, 
            'cidade' => $cidade, 
            'estado' => $estado
        ];
    }
}