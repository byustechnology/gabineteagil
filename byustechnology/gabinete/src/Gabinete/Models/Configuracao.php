<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\BelongsToPrefeitura;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    use BelongsToPrefeitura;

    /**
     * Define o nome da tabela
     * associada a este recurso.
     *
     * @var string
     */
    protected $table = 'configuracoes';

    /**
     * Definindo que nenhum campo
     * será bloqueado para o método
     * fill.
     *
     * @var array
     */
     protected $guarded = [];
}