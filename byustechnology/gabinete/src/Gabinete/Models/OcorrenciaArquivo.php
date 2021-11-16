<?php

namespace ByusTechnology\Gabinete\Models;

use App\Models\User;
use ByusTechnology\Gabinete\Traits\BelongsToPrefeitura;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaArquivo extends Model
{
    use HasFactory, HasFilters, BelongsToPrefeitura;

    const MIME_ICONS = [
        'application/pdf' => 'far fa-file-pdf',
        'image/jpeg' => 'far fa-images',
        'image/png' => 'far fa-images',
        'image/bmp' => 'far fa-images',
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
     * Define os modelos que precisam
     * ser carregados junto com
     * este recurso.
     *
     * @var array
     */
    protected $with = [
        'user'
    ];

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
     * Um arquivo pode estar associado a um
     * usuário.
     *
     * @return \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function getIconeMimeAttribute()
    {
        return array_key_exists($this->mime, self::MIME_ICONS) ? self::MIME_ICONS[$this->mime] : 'fas fa-paperclip';
    }
}
