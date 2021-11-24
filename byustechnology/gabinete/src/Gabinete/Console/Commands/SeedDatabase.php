<?php

namespace ByusTechnology\Gabinete\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class SeedDatabase extends Command
{
    /**
     * Define o nome para o comando.
     *
     * @var string
     */
    protected $signature = 'gabinete:seed';

    /**
     * Define a descrição do comando no console.
     *
     * @var string
     */
    protected $description = 'Executa os seeds na base de dados da aplicação';

    /**
     * Cria uma nova instância do comando.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Executa o comando no console.
     *
     * @return int
     */
    public function handle()
    {
        $this->newLine();
        $this->info('Adicionando prefeituras...');
        Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\PrefeiturasTableSeeder::class]);

        $this->newLine();
        $this->info('Adicionando usuário root');
        Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\UsersTableSeeder::class]);

        // $this->newLine();
        // $this->info('Adicionando etapas...');
        // Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\EtapasTableSeeder::class]);

        // $this->newLine();
        // $this->info('Adicionando tipo de ocorrências');
        // Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\TipoOcorrenciasTableSeeder::class]);

        // $this->newLine();
        // $this->info('Adicionando orgãos responsáveis...');
        // Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\OrgaosResponsaveisTableSeeder::class]);

        // $this->newLine();
        // $this->info('Adicionando assuntos...');
        // Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\AssuntosTableSeeder::class]);

        $this->newLine();
        $this->info('Adicionando pessoas...');
        Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\PessoasTableSeeder::class]);

        $this->newLine();
        $this->info('Adicionando contato para as pessoas...');
        Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\PessoaContatosTableSeeder::class]);

         $this->newLine();
         $this->info('Adicionando ocorrências...');
         Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\OcorrenciasTableSeeder::class]);

        // $this->newLine();
        // $this->info('Adicionando mensagens nas ocorrências...');
        // Artisan::call('db:seed', ['--class' => \ByusTechnology\Gabinete\Seeders\OcorrenciaMensagensTableSeeder::class]);

        $this->newLine();
        $this->info('Finalizado!');
    }
}
