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
        'pessoa',
        'assunto_id',
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

    protected function pessoa($pessoa)
    {
        return $this->builder->whereHas('pessoa', function ($query) use ($pessoa) {
            $query->where('titulo', 'like', '%' . $pessoa . '%');
        });
    }

    protected function assunto_id($assunto)
    {
        return $this->builder->where('assunto_id', $assunto);
    }
}
