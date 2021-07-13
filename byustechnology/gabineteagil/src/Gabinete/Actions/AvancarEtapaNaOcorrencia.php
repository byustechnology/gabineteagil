<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\Etapa;
use Exception;

class AvancarEtapaNaOcorrencia {

    public $ocorrencia;

    public $novaEtapa;

    public function __construct(Ocorrencia $ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    public function handle()
    {
        $novaEtapa = Etapa::where('ordem', '>', $this->ocorrencia->etapa->ordem)->first();

        if ( empty($novaEtapa)) {
            throw new Exception('Não há mais etapas para serem avançadas nesta ocorrência. Por favor, finalize a ocorrência ou altere as etapas manualmente');
        }

        $this->ocorrencia->etapa_id = $novaEtapa->id;
        $this->ocorrencia->update();
        
        $this->novaEtapa = $novaEtapa;

        return $this;
    }

}