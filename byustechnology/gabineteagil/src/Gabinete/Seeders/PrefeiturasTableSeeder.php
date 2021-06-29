<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Prefeitura;
use Illuminate\Database\Seeder;

class PrefeiturasTableSeeder extends Seeder
{

    /**
     * Executa os seeders na base 
     * de dados.
     *
     * @return void
     */
    public function run()
    {

        Prefeitura::firstOrCreate([
            'codigo' => 'SPRC', 
            'titulo' => 'Prefeitura de Rio Claro/SP', 
            'cidade' => 'Rio Claro', 
            'estado' => 'SP'
        ]);

    }
}