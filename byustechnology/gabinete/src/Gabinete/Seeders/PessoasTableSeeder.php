<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoasTableSeeder extends Seeder
{

    /**
     * Executa os seeders na base 
     * de dados.
     *
     * @return void
     */
    public function run()
    {
        Pessoa::factory()->count(5)->create(['prefeitura_id' => Prefeitura::first()->id]);
    }
}