<?php

namespace ByusTechnology\Gabinete\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class GabineteServiceProvider extends ServiceProvider
{
    
    /**
     * Registra os serviços da aplicação
     *
     * @return void
     */
    public function register()
    {        
        // Definindo os arquivos de configuração
        // relacionados ao pacote.
        $this->mergeConfigFrom(__DIR__ . '/../../config/gabinete.php', 'gabinete');
    }

    /**
     * Criando o bootstrap dos serviços
     * relacionados a aplicação
     *
     * @return void
     */
    public function boot()
    {        
        // Definindo o local das rotas 
        // relacionadas ao pacote.
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
         
        // Definindo o local referente 
        // as views do pacote.
        $this->loadViewsFrom(__DIR__ . '/../../views', 'gabinete');
 
        // Definindo o diretório relacionado 
        // as migrações específicas do pacote.
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/');

        // Caso a aplicação esteja executando 
        // em modo console, então registramos 
        // o comando responsável por fazer 
        // o seed na base de dados.
        if ($this->app->runningInConsole()) {
            $this->commands([
                \ByusTechnology\Gabinete\Console\Commands\SeedDatabase::class
            ]);
        }

        Paginator::useBootstrap();
    }
 

}