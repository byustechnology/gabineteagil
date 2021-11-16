<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Models\PessoaContato;
use Illuminate\Database\Seeder;

class PessoaContatosTableSeeder extends Seeder
{

    /**
     * Executa os seeders na base
     * de dados.
     *
     * @return void
     */
    public function run()
    {
        PessoaContato::factory()->count(5)->create(['prefeitura_id' => Prefeitura::first()->id, 'pessoa_id' => Pessoa::first()->id]);
    }
}
