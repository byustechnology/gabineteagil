<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\BelongsToPrefeitura;
use ByusTechnology\Gabinete\Traits\HasColorFields;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory, HasFilters, HasColorFields, BelongsToPrefeitura;

    /**
    * Definindo que nenhum campo
    * será bloqueado para o método
    * fill.
    *
    * @var array
    */
    protected $guarded = [];

    /**
    * Definindo o relacionamento entre
    * as etapas e as ocorrências.
    *
    * @return \Illuminate\Database\Eloquent\Collection
    */
    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::class);
    }

    /**
    * Define um caminho para o modelo.
    *
    * @return string
    */
    public function path()
    {
        return config('gabinete.path') . '/etapa/' . $this->id;
    }

    /**
    * Scope responsável pela ordenação do recurso.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeOrdenado($query)
    {
        return $query->orderBy('ordem');
    }
}