<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use ByusTechnology\Gabinete\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory, HasFilters, HasStatus;

    /**
     * Define quais são os tipos
     * de ocorrência disponíveis 
     * para cadastro
     * 
     */
    const TIPOS = [
        'Requerimento' => 'Requerimento', 
        'Indicação' => 'Indicação', 
        'Ofício' => 'Ofício', 
        'Moção' => 'Moção', 
        'Projeto' => 'Projeto' 
    ];

    /**
     * Definindo que nenhum campo 
     * será bloqueado para o método 
     * fill.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define os campos que devem ser 
     * tratados como data.
     * 
     * @var array
     */
    protected $dates = [
        'prevista_para', 
        'concluida_em', 
        'cancelada_em'
    ];

    /**
     * Define quais modelos devem 
     * ser carregados juntos 
     * com a ocorrência.
     * 
     * @var array
     */
    protected $with = [
        'etapa', 
        'pessoa', 
    ];

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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function mensagens()
    {
        return $this->hasMany(OcorrenciaMensagem::class)->ordenado();
    }

    /**
     * Definindo o relacionamento entre 
     * os arquivos e a ocorrência.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function arquivos()
    {
        return $this->hasMany(OcorrenciaArquivo::class);
    }

    /**
     * Retorna se a ocorrência está concluida
     * 
     * @return boolean
     */
    public function concluida()
    {
        return ! empty($this->concluida_em);
    }

    /**
     * Retorna se a ocorrência está cancelada
     * 
     * @return boolean
     */
    public function cancelada()
    {
        return ! empty($this->cancelada_em);
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

    /**
     * Verifica se a ocorrência foi criada 
     * em menos de 01 dia.
     * 
     * @return boolean
     */
    public function getNovaAttribute()
    {
        return $this->created_at->diffInDays(today()) > 1 ? false : true;
    }

    /**
     * Retorna se a ocorrência está 
     * na última etapa.
     * 
     * @return boolean
     */
    public function getUltimaEtapaAttribute()
    {
        if ($this->etapa->ordem == Etapa::max('ordem')) {
            return true;
        }

        return false;
    }
}
