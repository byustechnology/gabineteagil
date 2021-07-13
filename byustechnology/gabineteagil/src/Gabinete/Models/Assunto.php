<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasColorFields;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory, HasFilters, HasColorFields;

    /**
     * Definindo que nenhum campo
     * será bloqueado para o método
     * fill.
     *
     * @var array
     */
     protected $guarded = [];

     /**
     * Define as contagens que precisam 
     * ser carregadas com este 
     * modelo.
     * 
     * @var array
     */
    protected $withCount = [
        'ocorrencias', 
    ];

     /**
      * Um orgão pode possuir várias 
      * ocorrências associadas a ele.
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
        return config('gabinete.path') . '/assunto/' . $this->id;
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