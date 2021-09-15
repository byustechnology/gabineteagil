<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\TipoOcorrencia;
use Illuminate\Database\Seeder;

class TipoOcorrenciasTableSeeder extends Seeder
{

    /**
     * Executa os seeders na base 
     * de dados.
     *
     * @return void
     */
    public function run()
    {

        $prefeitura = Prefeitura::first();

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'titulo' => 'Requerimento'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'titulo' => 'Indicação'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'titulo' => 'Ofício'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'titulo' => 'Moção'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'titulo' => 'Projeto'
        ]);
    }
}