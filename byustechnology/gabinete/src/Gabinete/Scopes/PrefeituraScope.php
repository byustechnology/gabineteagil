<?php

namespace ByusTechnology\Gabinete\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PrefeituraScope implements Scope
{
    /**
     * Aplica o scope para modelo.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // Verifica o ID do prefeitura registrado
        // na sessão, e então aplica a filtro
        // de forma global.
        if (session()->has('prefeitura')) {
            $builder->where('prefeitura_id', session()->get('prefeitura'));
        }
    }
}