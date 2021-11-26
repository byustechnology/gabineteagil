<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Ocorrencia;

class FormatarTemplateOcorrencia {

    const TAGS = [
        '!@codigo' => 'Código da ocorrência',
        '!@dataHoje' => 'Data do dia atual',
        '!@protocolo' => 'Protocolo da ocorrência',
        '!@observacao' => 'Observação da ocorrência',
        '!@cidadePrefeitura' => 'Cidade onde a prefeitura está localizada',
        '!@orgaoResponsavelNome' => 'Nome do responsável pelo orgão associado',
        '!@orgaoResponsavelTelefone' => 'Telefone do responsável pelo orgão associado',
        '!@orgaoResponsavelEmail' => 'E-mail do responsável pelo orgão associado',
        '!@consideracao' => 'Exibe o cadastro das considerações relacionadas ao tipo da ocorrência',
        '!@endereco' => 'Exibe o endereço da ocorrência'
    ];

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
            '!@cidadePrefeitura' => $this->ocorrencia->prefeitura->cidade,
            '!@orgaoResponsavel' => $this->ocorrencia->orgaoResponsavel->titulo,
            '!@orgaoResponsavelNome' => optional($this->ocorrencia->orgao)->responsavel,
            '!@orgaoResponsavelTelefone' => optional($this->ocorrencia->orgao)->responsavel_telefone,
            '!@orgaoResponsavelEmail' => optional($this->ocorrencia->orgao)->responsavel_email,
            '!@consideracao' => optional($this->ocorrencia->ocorrenciaTipo)->consideracao,
            '!@endereco' => $this->ocorrencia->endereco_completo,
        ];

        return str_replace(array_keys($replaces), array_values($replaces), $this->ocorrencia->descricao);
    }
}