<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use ByusTechnology\Gabinete\Traits\NeedsAutocode;
use Illuminate\Database\Eloquent\Model;

class Prefeitura extends Model
{
    use HasFactory, HasFilters, NeedsAutocode;

    /**
    * Definindo que nenhum campo
    * será bloqueado para o método
    * fill.
    *
    * @var array
    */
    protected $guarded = [];

    /**
     * Uma prefeitura possui
     * vários usuários associados
     * a ela.
     *
     * @return
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }


    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('gabinete.path') . '/prefeitura/' . $this->id;
    }

    /**
     * Scope responsável pela ordenação do recurso.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenado($query)
    {
        return $query->orderBy('titulo');
    }
}