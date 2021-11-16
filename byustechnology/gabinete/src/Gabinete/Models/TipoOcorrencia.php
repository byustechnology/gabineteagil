<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\BelongsToPrefeitura;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class TipoOcorrencia extends Model
{
    use HasFactory, HasFilters, BelongsToPrefeitura;

    /**
     * Definindo que nenhum campo
     * será bloqueado para o método
     * fill.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('gabinete.path') . '/ocorrencia/tipo/' . $this->id;
    }

    /**
     * Scope responsável pela ordenação do recurso.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenado($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
