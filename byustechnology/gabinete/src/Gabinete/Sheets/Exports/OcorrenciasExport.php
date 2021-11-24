<?php

namespace ByusTechnology\Gabinete\Sheets\Exports;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OcorrenciasExport implements FromCollection, WithHeadings, WithMapping
{

    public $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        return Ocorrencia::filter($this->filters)->get();
    }

    public function headings(): array
    {
        return [
            'Tipo da ocorrência',
            'Pessoa',
            'Status',
            'Etapa',
            'Protocolo',
            'CEP',
            'Logradouro',
            'Número',
            'Complemento',
            'Bairro',
            'Cidade',
            'Estado',
            'Orgão responsável',
            'Assunto',
            'Caminho',
            'Adicionada em'
        ];
    }

    public function map($row): array
    {
        return [
            $row->tipoOcorrencia->titulo,
            $row->status->descricao,
            $row->etapa->titulo,
            $row->pessoa->titulo,
            $row->protocolo,
            $row->cep,
            $row->logradouro,
            $row->numero,
            $row->complemento,
            $row->bairro,
            $row->cidade,
            $row->estado,
            $row->orgaoResponsavel->titulo,
            $row->assunto->titulo,
            $row->path(),
            $row->created_at->format('d/m/Y H:i:s')
        ];
    }
}