<?php

namespace ByusTechnology\Gabinete\Filters;

class OcorrenciaFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        's',
        'keyword',
        'codigo',
        'titulo',
        'descricao', 
        'pessoa',
        'pessoa_id', 
        'orgao_id', 
        'assunto_id',
        'etapa_id',
        'tipo_ocorrencia', 
        'abertas', 
        'canceladas', 
        'concluidas', 
        'abertaHa', 
        'atrasadas'
    ];

    protected function keyword($keyword)
    {
        $field = $this->request->field;
        $this->$field($keyword);
    }

    protected function s($keyword)
    {
        return $this->builder->where(function ($q) use ($keyword) {
            $q->orWhere('codigo', 'like', '%' . $keyword . '%');
            $q->orWhere('titulo', 'like', '%' . $keyword . '%');
        });
    }

    protected function codigo($codigo)
    {
        return $this->builder->where('codigo', $codigo);
    }

    protected function titulo($titulo)
    {
        return $this->builder->where('titulo', 'like', '%' . $titulo . '%');
    }

    protected function descricao($descricao)
    {
        return $this->builder->where('descricao', 'like', '%' . $descricao . '%');
    }

    protected function tipo_ocorrencia_id($tipo_ocorrencia)
    {
        return $this->builder->where('tipo_ocorrencia_id', $tipo_ocorrencia);
    }

    protected function pessoa($pessoa)
    {
        return $this->builder->whereHas('pessoa', function ($query) use ($pessoa) {
            $query->where('titulo', 'like', '%' . $pessoa . '%');
        });
    }

    protected function pessoa_id($pessoa)
    {
        return $this->builder->where('pessoa_id', $pessoa);
    }

    protected function orgao_id($orgao)
    {
        return $this->builder->where('orgao_responsavel_id', $orgao);
    }

    protected function assunto_id($assunto)
    {
        return $this->builder->where('assunto_id', $assunto);
    }

    protected function etapa_id($etapa)
    {
        return $this->builder->where('etapa_id', $etapa);
    }

    protected function abertas($abertas = 0)
    {
        if ($abertas == 1) {
            return $this->builder->abertas();
        }
    }

    protected function canceladas($canceladas = 0)
    {
        if ($canceladas == 1) {
            return $this->builder->canceladas();
        }
    }

    protected function concluidas($concluidas = 0)
    {
        if ($concluidas == 1) {
            return $this->builder->concluidas();
        }
    }


    protected function abertasHa($dias = 1)
    {
        return $this->builder->abertas()->whereDate('created_at', '<=', today())->where('created_at', '>=', today()->subDays($dias));
    }

    protected function atrasadas($atrasadas = 0)
    {
        if ($atrasadas == 1) {
            return $this->builder->atrasadas();
        }
    }


}
