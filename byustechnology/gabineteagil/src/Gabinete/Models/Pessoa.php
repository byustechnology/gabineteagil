<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory, HasFilters;

    const TIPO = [
        'f' => 'Física', 
        'j' => 'Jurídica', 
    ];

    const GENERO = [
        'masculino' => 'Masculino', 
        'feminino' => 'Feminino'
    ];

    const ESTADO_CIVIL = [
        'Solteiro' => 'Solteiro', 
        'Casado' => 'Casado'
    ];

    const ESCOLARIDADE = [
        'Primeiro grau completo' => 'Primeiro grau completo', 
    ];

    const RESIDENCIA_TIPO = [
        'casa' => 'Casa', 
        'condiminio' => 'Condomínio'
    ];

    const MORADIA_TIPO = [
        'propria' => 'Casa prória', 
        'aluguel' => 'Aluguel'
    ];

    const INFLUENCIA = [
        0 => 'Baixa', 
        1 => 'Média', 
        2 => 'Alta', 
        3 => 'Altíssima'
    ];

    const COLABORADORES_QUANTIDADE = [
        '1 a 10' => 'De 1 a 10 colaboradores', 
        '11 a 50' => 'De 11 a 50 colaboradores', 
        '51 a 150' => 'De 51 a 150 colaboradores', 
        'Mais que 150' => 'Mais que 150 colaboradores', 
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
     * Define os campos do recurso
     * que deverão ser tratados
     * como data.
     * 
     * @var array
     */
    protected $dates = [
        'nascido_em', 
        'conjugue_nascido_em', 
        'fundada_em'
    ];

    /**
     * Uma pessoa pode estar 
     * atrelada a várias formas 
     * de contato.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function contatos()
    {
        return $this->hasMany(PessoaContato::class);
    }

    /**
     * Uma pessoa pode estar 
     * atrelada a várias ocorrências
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
        return config('gabinete.path') . '/pessoa/' . $this->id;
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
