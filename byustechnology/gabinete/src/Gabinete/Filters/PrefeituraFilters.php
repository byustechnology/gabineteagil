<?php

namespace ByusTechnology\Gabinete\Filters;

class PrefeituraFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        'keyword',
        's',
        'codigo',
        'titulo',
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
}