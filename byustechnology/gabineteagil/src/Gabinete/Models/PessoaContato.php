<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class PessoaContato extends Model
{
    use HasFactory, HasFilters;

    /**
     * Define os tipos de contato 
     * disponíveis para cadastro.
     * 
     */
    const TIPOS = [
        'whats' => 'WhatsApp',
        'cel' => 'Celular',
        'fixo' => 'Telefone fixo',
        'email' => 'E-mail',
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
     * Um contato está associado 
     * a uma pessoa.
     * 
     * @return \ByusTechnology\Gabinete\Models\Pessoa
     */
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    /**
     * Define um caminho para o modelo.
     *
     * @return string
     */
    public function path()
    {
        return $this->pessoa->path() . '/contato/' . $this->id;
    }

    /**
     * Scope responsável pela ordenação do recurso.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdenado($query)
    {
        return $query->orderBy('tipo');
    }
}
