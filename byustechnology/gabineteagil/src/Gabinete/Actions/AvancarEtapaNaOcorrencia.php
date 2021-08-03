<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\Etapa;
use Illuminate\Http\Request;
use Exception;

class AvancarEtapaNaOcorrencia {

    public $ocorrencia;

    public $novaEtapa;

    public function __construct(Ocorrencia $ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    public function handle(Request $request)
    {
        $novaEtapa = Etapa::where('ordem', '>', $this->ocorrencia->etapa->ordem)->first();

        if ( empty($novaEtapa)) {
            throw new Exception('Não há mais etapas para serem avançadas nesta ocorrência. Por favor, finalize a ocorrência ou altere as etapas manualmente');
        }

        $this->ocorrencia->fill($request->all());
        $this->ocorrencia->etapa_id = $novaEtapa->id;

        if (request()->has('protocolo')) {
            $this->ocorrencia->protocolo = request('protocolo');
        }
        
        $this->ocorrencia->update();
        
        $this->novaEtapa = $novaEtapa;

        return $this;
    }

}