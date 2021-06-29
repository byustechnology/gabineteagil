<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\OrgaoResponsavel;
use Illuminate\Database\Seeder;

class OrgaosResponsaveisTableSeeder extends Seeder
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

        OrgaoResponsavel::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'codigo' => 'SCDE', 
            'titulo' => 'Secretaria da educação', 
            'descricao' => 'Orgão responsável para assuntos e ocorrências referentes a educação'
        ]);

        OrgaoResponsavel::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'codigo' => 'SCEEP', 
            'titulo' => 'Secretaria de engenharia e projetos', 
            'descricao' => 'Orgão responsável para assuntos e ocorrências referentes a engenharia e projetos'
        ]);

        OrgaoResponsavel::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'codigo' => 'SCDF', 
            'titulo' => 'Secretaria de finanças', 
            'descricao' => 'Orgão responsável para assuntos e ocorrências referentes a finanças'
        ]);

        OrgaoResponsavel::firstOrCreate([
            'prefeitura_id' => $prefeitura->id, 
            'codigo' => 'PDCF', 
            'titulo' => 'Proteção e defesa cívil', 
            'descricao' => 'Orgão responsável para assuntos e ocorrências referentes a proteção e defesa cívil'
        ]);
    }
}