<?php

namespace ByusTechnology\Gabinete\Models;

use App\Models\User;
use ByusTechnology\Gabinete\Traits\HasFactory;
use ByusTechnology\Gabinete\Traits\HasFilters;
use Illuminate\Database\Eloquent\Model;

class OcorrenciaMensagem extends Model
{
    use HasFactory, HasFilters;

    /**
     * Definindo um novo padrão de nome
     * para a tabela relacionada a este modelo.
     * 
     * @var string
     */
    protected $table = 'ocorrencia_mensagens';

    /**
     * Definindo que nenhum campo 
     * será bloqueado para o método 
     * fill.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define quais recursos devem 
     * ser carregados juntos com 
     * a mensagem.
     * 
     * @var array
     */
    protected $with = [
        'user', 
        'arquivos', 
    ];

    /**
     * Uma mensagem pertence a uma 
     * determinada ocorrência.
     * 
     * @return \ByusTechnology\Gabinete\Models\Ocorrencia
     */
    public function ocorrencia()
    {
        return $this->belongsTo(Ocorrencia::class);
    }

    /**
     * Definindo o relacionamento entre 
     * os arquivos e a mensagem.
     * 
     * @return \ByusTechnology\Gabinete\Models\OcorrenciaArquivo
     */
    public function arquivos()
    {
        return $this->hasMany(OcorrenciaArquivo::class);
    }

    /**
     * Uma mensagem poder pertencer a um 
     * determinado usuário.
     * 
     * @return \ByusTechnology\Gabinete\Models\OcorrenciaArquivo
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
        return $this->ocorrencia->path() . '/mensagem/' . $this->id;
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
