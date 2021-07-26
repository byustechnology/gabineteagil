<?php

namespace ByusTechnology\Gabinete\Filters;

class AgendaFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        's', 
        'keyword', 
        'titulo', 
        'inicio_em', 
        'termino_em', 
        'user_id'
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

    protected function titulo($titulo)
    {
        return $this->builder->where('titulo', 'like', '%' . $titulo . '%');
    }

    protected function inicio_em($inicio_em)
    {
        return $this->builder->where('inicio_em', $inicio_em);
    }

    protected function termino_em($termino_em)
    {
        return $this->builder->where('termino_em', $termino_em);
    }

    protected function user_id($user_id)
    {
        return $this->builder->where('user_id', $user_id);
    }
}