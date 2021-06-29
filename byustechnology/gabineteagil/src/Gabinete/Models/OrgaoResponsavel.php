<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasColorFields;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class OrgaoResponsavel extends Model
{
    use HasFactory, HasFilters, HasColorFields;

    /**
     * Define o nome da tabela relacionado 
     * a este recurso.
     * 
     * @var string
     */
    protected $table = 'orgaos_responsaveis';

    /**
     * Definindo os campos que podem 
     * ser preenchidos.
     *
     * @var array
     */
     protected $fillable = [
         'codigo', 
         'titulo', 
         'descricao', 
         'cor', 
     ];
    
    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('gabinete.path') . '/orgao/' . $this->id;
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