<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Etapa;
use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Models\OrgaoResponsavel;
use ByusTechnology\Gabinete\Models\Assunto;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class OcorrenciaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ocorrencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prefeitura_id' => Prefeitura::factory(),
            'pessoa_id' => Pessoa::factory(),
            'orgao_responsavel_id' => OrgaoResponsavel::factory(),
            'assunto_id' => Assunto::factory(),
            'etapa_id' => Etapa::factory(),
            'titulo' => $this->faker->sentence(2),
            'descricao' => $this->faker->realText(),
        ];
    }
}
