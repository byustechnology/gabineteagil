<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Etapa;
use ByusTechnology\Gabinete\Utils\CalcularContraste;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtapaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etapa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cor = $this->faker->hexcolor();

        return [
            'codigo' => Str::upper('ET-' . $this->faker->unique()->bothify('####')),
            'titulo' => $this->faker->sentence(1),
            'ordem' => $this->faker->unique()->randomNumber(),
            'cor' => $cor,
            'cor_texto' => CalcularContraste::handle($cor)
        ];
    }
}
