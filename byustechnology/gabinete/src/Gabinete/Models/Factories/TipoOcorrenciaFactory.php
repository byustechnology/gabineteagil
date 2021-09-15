<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\TipoOcorrencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoOcorrenciaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoOcorrencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prefeitura_id' => Prefeitura::factory(), 
            'titulo' => $this->faker->sentence(3), 
            'descricao' => $this->faker->realText(), 
            'template' => $this->faker->optional()->realText(), 
        ];
    }
}