<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\OcorrenciaMensagem;
use Illuminate\Database\Seeder;

class OcorrenciaMensagensTableSeeder extends Seeder
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

        foreach (range(1, 10) as $range) {
            OcorrenciaMensagem::firstOrCreate([
                'ocorrencia_id' => Ocorrencia::first()->id,
                'mensagem' => $faker->realText(),
            ]);
        }
    }
}
