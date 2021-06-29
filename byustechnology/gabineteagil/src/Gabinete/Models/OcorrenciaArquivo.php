<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaArquivo extends Model
{
    use HasFactory, HasFilters;

    /**
     * Definindo que nenhum campo 
     * será bloqueado para o método 
     * fill.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Um arquivo pertence a uma 
     * determinada ocorrência.
     * 
     * @return \ByusTechnology\Gabinete\Models\Ocorrencia
     */
    public function ocorrencia()
    {
        return $this->belongsTo(Ocorrencia::class);
    }

    /**
     * Um arquivo pode pertencer a uma 
     * determinada mensagem.
     * 
     * @return \ByusTechnology\Gabinete\Models\Ocorrencia
     */
    public function mensagem()
    {
        return $this->belongsTo(Mensagem::class);
    }

    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return $this->ocorrencia->path() . '/arquivo/' . $this->id;
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
