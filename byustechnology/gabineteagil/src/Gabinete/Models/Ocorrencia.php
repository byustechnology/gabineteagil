<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
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
     * Define as contagens que precisam 
     * ser carregadas com este 
     * modelo.
     * 
     * @var array
     */
    protected $withCount = [
        'mensagens', 
        'arquivos'
    ];

    /**
     * Uma ocorrência pertence a uma
     * determinada prefeitura.
     * 
     * @return \ByusTechnology\Gabinete\Models\Prefeitura
     */
    public function prefeitura()
    {
        return $this->belongsTo(Prefeitura::class);
    }

    /**
     * Uma ocorrência pertence a uma
     * determinada pessoa.
     * 
     * @return \ByusTechnology\Gabinete\Models\Pessoa
     */
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    /**
     * Uma ocorrência pertence a um
     * determinado orgão.
     * 
     * @return \ByusTechnology\Gabinete\Models\OrgaoResponsavel
     */
    public function orgaoResponsavel()
    {
        return $this->belongsTo(OrgaoResponsavel::class);
    }

    /**
     * Definindo o relacionamento entre 
     * a ocorrência e o assunto indicado.
     * 
     * @return \ByusTechnology\Gabinete\Models\Assunto
     */
    public function assunto()
    {
        return $this->belongsTo(Assunto::class);
    }

    /**
     * Definindo o relacionamento entre 
     * as etapas e a ocorrência.
     * 
     * @return \ByusTechnology\Gabinete\Models\Etapa
     */
    public function etapa()
    {
        return $this->belongsTo(Etapa::class);
    }

    /**
     * Definindo o relacionamento entre 
     * as mensagens e a ocorrência.
     * 
     * @return \ByusTechnology\Gabinete\Models\OcorrenciaMensagem
     */
    public function mensagens()
    {
        return $this->hasMany(OcorrenciaMensagem::class);
    }

    /**
     * Definindo o relacionamento entre 
     * os arquivos e a ocorrência.
     * 
     * @return \ByusTechnology\Gabinete\Models\OcorrenciaArquivo
     */
    public function arquivos()
    {
        return $this->hasMany(OcorrenciaArquivo::class);
    }

    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('gabinete.path') . '/ocorrencia/' . $this->id;
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

    public function getNovaAttribute()
    {
        return $this->created_at->diffInDays(today()) > 1 ? false : true;
    }
}
