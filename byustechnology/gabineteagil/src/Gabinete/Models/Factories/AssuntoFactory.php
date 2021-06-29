<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Assunto;
use ByusTechnology\Gabinete\Utils\CalcularContraste;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssuntoFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assunto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cor = $this->faker->hexcolor();

        return [
            'prefeitura_id' => Prefeitura::factory(),
            'codigo' => Str::upper('AS-' . $this->faker->unique()->bothify('####')),
            'titulo' => $this->faker->sentence(2),
            'descricao' => $this->faker->realText(),
            'cor' => $cor,
            'cor_texto' => CalcularContraste::handle($cor)
        ];
    }
}
