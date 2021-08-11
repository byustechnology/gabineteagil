<?php

namespace ByusTechnology\Gabinete\Filters;

class UsuarioFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        'keyword', 
        's', 
        'name', 
        'email'
    ];

    protected function keyword($keyword)
    {
        $field = $this->request->field;
        $this->$field($keyword);
    }

    protected function s($keyword)
    {
        return $this->builder->where(function($q) use ($keyword) {
            $q->orWhere('name', 'like', '%' . $keyword . '%');
            $q->orWhere('email', 'like', '%' . $keyword . '%');
        });
    }

    protected function name($name)
    {
        return $this->builder->where('name', $name);
    }

    protected function email($email)
    {
        return $this->builder->where('email', $email);
    }
}