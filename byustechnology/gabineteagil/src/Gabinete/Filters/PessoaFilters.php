<?php

namespace ByusTechnology\Gabinete\Filters;

class PessoaFilters extends Filters
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
        'documento', 
        'tipo', 
        'aniversariantes', 
        'comOcorrenciasAtrasadas'
    ];

    protected function keyword($keyword)
    {
        $field = $this->request->field;
        $this->$field($keyword);
    }

    protected function s($keyword)
    {
        return $this->builder->where(function($q) use ($keyword) {
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

    protected function documento($documento)
    {
        return $this->builder->where('documento', 'like', '%' . $documento . '%');
    }

    protected function tipo($tipo)
    {
        return $this->builder->where('tipo', $tipo);
    }

    protected function aniversariantes($aniversariantes = 0)
    {
        if ($aniversariantes == 1) {
            return $this->builder->whereDate('nascido_em', today());
        }
    }
}