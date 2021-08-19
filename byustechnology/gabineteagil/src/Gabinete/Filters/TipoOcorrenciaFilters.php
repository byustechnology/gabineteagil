<?php

namespace ByusTechnology\Gabinete\Filters;

class TipoOcorrenciaFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        's', 
        'id', 
        'titulo', 
    ];

    protected function s($keyword)
    {
        return $this->builder->where(function($q) use ($keyword) {
            $q->orWhere('titulo', 'like', '%' . $keyword . '%');
        });
    }

    protected function id($id)
    {
        return $this->builder->find($id);
    }

    protected function titulo($titulo)
    {
        return $this->builder->where('titulo', 'like', '%' . $titulo . '%');
    }
}