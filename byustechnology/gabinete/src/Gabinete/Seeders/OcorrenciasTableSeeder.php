<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Assunto;
use ByusTechnology\Gabinete\Models\Etapa;
use ByusTechnology\Gabinete\Models\OrgaoResponsavel;
use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use Illuminate\Database\Seeder;

class OcorrenciasTableSeeder extends Seeder
{

    /**
     * Executa os seeders na base 
     * de dados.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Ocorrencia::firstOrCreate([
            'prefeitura_id' => Prefeitura::first()->id,
            'pessoa_id' => Pessoa::first()->id,
            'assunto_id' => Assunto::first()->id,
            'etapa_id' => Etapa::first()->id,
            'orgao_responsavel_id' => OrgaoResponsavel::first()->id,
            'titulo' => 'Ocorrência de teste',
            'descricao' => $faker->realText(),
        ]);
    }
}
