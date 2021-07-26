<?php

namespace ByusTechnology\Gabinete\Observers;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\OcorrenciaMensagem;
use ByusTechnology\Gabinete\Models\Pessoa;

class OcorrenciaObserver
{
    /**
     * Handle the Ocorrencia "creating" event.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return void
     */
    public function creating(Ocorrencia $ocorrencia)
    {

        // Caso não seja solicitada a mudança de 
        // endereço no formulário, vamos pegar 
        // o endereço da pessoa cadastrada
        if ( ! request()->has('mudar_endereco')) {

            $pessoa = Pessoa::find(request('pessoa_id'));
            
            $ocorrencia->fill($pessoa->only([
                'cep', 
                'logradouro', 
                'numero', 
                'complemento', 
                'bairro', 
                'cidade', 
                'estado', 
            ]));
        }
    }

    /**
     * Handle the Ocorrencia "created" event.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return void
     */
    public function created(Ocorrencia $ocorrencia)
    {
        $ocorrencia->mensagens()->save(new OcorrenciaMensagem([
            'mensagem' => 'Ocorrência criada em ' . date('d/m/Y à\s H:i:s') . ' por ' . optional(auth()->user())->name ?? 'Sistema', 
            'tipo' => 'sys'
        ]));
    }

}