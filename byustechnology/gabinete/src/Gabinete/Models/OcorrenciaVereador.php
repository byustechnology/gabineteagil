<?php

namespace ByusTechnology\Gabinete\Models;

use ByusTechnology\Gabinete\Traits\BelongsToPrefeitura;
use ByusTechnology\Gabinete\Traits\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaVereador extends Model
{
    use HasFactory, BelongsToPrefeitura;

    /**
     * Define a tabela relacionada a este
     * recurso.
     *
     * @var string
     */
    protected $table = 'ocorrencia_vereadores';

    /**
     * Definindo que nenhum campo
     * será bloqueado para o método
     * fill.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Definindo a relação entre os
     * vereadores e as ocorrências.
     *
     * @return \ByusTechnology\Gabinete\Models\Ocorrencia
     */
    public function ocorrencia()
    {
        return $this->belongsTo(Ocorrencia::class);
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
}
