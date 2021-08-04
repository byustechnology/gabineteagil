<?php

namespace ByusTechnology\Gabinete\Models;

use App\Models\User;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory, HasFilters;

    /**
     * Define as cores disponíveis
     * para os agendamentos.
     * 
     */
    const CORES = [
        '#ffc107' => 'Padrão (amarelo)', 
        '#007bff' => 'Azul', 
        '#dc3545' => 'Vermelho', 
        '#28a745' => 'Verde'
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
     * Define quais campos deverão
     * ser tratados como sendo 
     * um campo data.
     * 
     * @var array
     */
    protected $dates = [
        'inicio_em', 
        'termino_em'
    ];

    /**
     * Define um relacionamento entre 
     * a agenda e o usuário associado 
     * a ela
     * 
     * @return \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return config('gabinete.path') . '/agenda/' . $this->id;
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