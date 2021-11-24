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

        if ( app()->runningInConsole()) {

            $pessoa = Pessoa::find($ocorrencia->pessoa_id);

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

        // Caso não seja solicitada a mudança de
        // endereço no formulário, vamos pegar
        // o endereço da pessoa cadastrada
        if ( ! request()->has('mudar_endereco') and ! app()->runningInConsole()) {

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
            'prefeitura_id' => $ocorrencia->prefeitura_id,
            'mensagem' => 'Ocorrência criada em ' . date('d/m/Y à\s H:i:s') . ' por ' . optional(auth()->user())->name ?? 'Sistema',
            'tipo' => 'sys'
        ]));
    }

}