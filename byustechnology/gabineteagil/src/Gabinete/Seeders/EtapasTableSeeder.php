<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Etapa;
use Illuminate\Database\Seeder;

class EtapasTableSeeder extends Seeder
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

        $etapas = [
            'Aguardando', 
            'Em análise', 
            'Enviado para cotação', 
            'Aguardando seleção', 
            'Em fase de preparação', 
            'Executando', 
            'Finalizando', 
        ];

        foreach($etapas as $ordem => $etapa) {
            Etapa::firstOrCreate([
                'codigo' => 'ET-' . $ordem, 
                'titulo' => $etapa, 
                'ordem' => $ordem, 
                'cor' => $faker->hexcolor(), 
            ]);
        }

    }
}