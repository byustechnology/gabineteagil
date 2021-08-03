<?php

namespace ByusTechnology\Ui\Providers;

use Illuminate\Support\ServiceProvider;

class UiServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__ . '/../../config/ui.php', 'ui');
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
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
         
        // Definindo o local referente 
        // as views do pacote.
        $this->loadViewsFrom(__DIR__ . '/../../views', 'ui');
    }
}