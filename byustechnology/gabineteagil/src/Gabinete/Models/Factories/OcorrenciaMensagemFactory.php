<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\OcorrenciaMensagem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OcorrenciaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OcorrenciaMensagem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ocorrencia_id' => Ocorrencia::factory(),
            'mensagem' => $this->faker->realText(),
        ];
    }
}
