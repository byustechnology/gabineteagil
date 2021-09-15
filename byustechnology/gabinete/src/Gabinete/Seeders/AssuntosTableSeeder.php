<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Assunto;
use Illuminate\Database\Seeder;

class AssuntosTableSeeder extends Seeder
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

        $assuntos = [
            'CMT' => 'Cemitério', 
            'CST' => 'Consulta', 
            'REC' => 'Recapeamento', 
            'DES' => 'Desdobro', 
        ];

        foreach($assuntos as $codigo => $titulo) {
            Assunto::factory()->create([
                'prefeitura_id' => $prefeitura->id, 
                'codigo' => $codigo, 
                'titulo' => $titulo, 
            ]);
        }
    }
}