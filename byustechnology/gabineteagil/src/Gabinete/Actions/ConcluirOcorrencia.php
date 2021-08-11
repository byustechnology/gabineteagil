<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\Etapa;
use ByusTechnology\Gabinete\Actions\StoreOcorrenciaArquivo;
use Illuminate\Http\Request;
use Exception;

class ConcluirOcorrencia {

    public $ocorrencia;

    public function __construct(Ocorrencia $ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    public function handle(Request $request)
    {

        // Realiza o upload do arquivo, caso 
        // haja algum na request.
        if ($request->has('arquivo')) {
            (new StoreOcorrenciaArquivo($this->ocorrencia, $request->arquivo))->handle();
        }

        $this->ocorrencia->concluida_em = $request->concluida_em ?? now();
        $this->ocorrencia->concluida_por = auth()->user()->id;
        $this->ocorrencia->concluida_observacao = $request->concluida_observacao;
        $this->ocorrencia->update();

        return $this;
    }

}