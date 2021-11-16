<?php

namespace ByusTechnology\Gabinete\Seeders;

use ByusTechnology\Gabinete\Actions\CriarPrefeitura;
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

        $rioClaro = Prefeitura::firstOrCreate([
            'titulo' => 'Prefeitura de Rio Claro/SP',
            'cidade' => 'Rio Claro',
            'estado' => 'SP'
        ]);

        $processos = new CriarPrefeitura($rioClaro, [
            'user_name' => 'Administrador Rio Claro/SP',
            'user_email' => 'admin@rioclaro.gov.br',
            'password' => bcrypt('secret')
        ]);
        $processos->handle();

        $santaGertrudes = Prefeitura::firstOrCreate([
            'titulo' => 'Prefeitura de Santa Gertrudes/SP',
            'cidade' => 'Santa Gertrudes',
            'estado' => 'SP'
        ]);

        $processos = new CriarPrefeitura($santaGertrudes, [
            'user_name' => 'Administrador Santa Gertrudes/SP',
            'user_email' => 'admin@santagertrudes.gov.br',
            'password' => bcrypt('secret')
        ]);
        $processos->handle();

    }
}