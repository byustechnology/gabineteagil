<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\BelongsToPrefeitura;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use ByusTechnology\Gabinete\Traits\HasAddress;
use ByusTechnology\Gabinete\Traits\NeedsAutocode;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory, HasFilters, HasAddress, NeedsAutocode, BelongsToPrefeitura;

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
        'Ensino fundamental' => 'Ensino fundamental',
        'Ensino médio' => 'Ensino médio',
        'Ensino superior' => 'Ensino superior',
        'Ensino fundamental incompleto' => 'Ensino fundamental incompleto',
        'Ensino médio incompleto' => 'Ensino médio incompleto',
        'Ensino superior incompleto' => 'Ensino superior completo',
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
     * Define quais modelos devem
     * ser contados juntos com
     * o recurso.
     *
     * @var string
     */
    protected $withCount = [
        'contatos',
        'ocorrencias',
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
