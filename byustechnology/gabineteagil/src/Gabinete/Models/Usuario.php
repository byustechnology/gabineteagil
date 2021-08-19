<?php

namespace ByusTechnology\Gabinete\Models;

use App\Models\User;
use ByusTechnology\Gabinete\Traits\HasFilters;

class Usuario extends User
{
    use HasFilters;

    const TYPES = [
        '' => 'Não definido', 
        'admin' => 'Administrador', 
        'vereador' => 'Vereador', 
        'funcionario' => 'Funcionario', 
    ];

    /**
     * Define qual o nome da tabela associada
     * a este recurso
     * 
     * @var string
     */
    protected $table = 'users';

    /**
     * Scope responsável por filtrar os usuários vereadores.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVereadores($query)
    {
        return $query->where('type', 'vereador');
    }

    /**
     * Scope responsável pela ordenação do recurso.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenado($query)
    {
        return $query->orderBy('name');
    }

    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('gabinete.path') . '/usuario/' . $this->id;
    }
}