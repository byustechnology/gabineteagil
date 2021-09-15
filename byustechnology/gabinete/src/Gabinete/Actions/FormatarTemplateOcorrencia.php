<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use Illuminate\Http\Request;

class FormatarTemplateOcorrencia {

    public $ocorrencia;

    public function __construct(Ocorrencia $ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    public function handle()
    {
        $replaces = [
            '!@codigo' => $this->ocorrencia->id, 
            '!@dataHoje' => today()->format('d/m/Y'), 
            '!@protocolo' => $this->ocorrencia->protocolo, 
            '!@observacao' => $this->ocorrencia->observacao, 
            '!@cidadePrefeitura' => $this->ocorrencia->prefeitura->cidade
        ];

        return str_replace(array_keys($replaces), array_values($replaces), $this->ocorrencia->descricao);
    }
}