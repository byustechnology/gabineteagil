<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\OcorrenciaArquivo;
use ByusTechnology\Gabinete\Models\OcorrenciaMensagem;
use ByusTechnology\Gabinete\Actions\HandleUserUploadedFile;
use Illuminate\Http\UploadedFile;

class StoreOcorrenciaArquivo
{

    protected $ocorrencia;

    protected $file;

    protected $mensagem;

    public $arquivo;

    public function __construct(Ocorrencia $ocorrencia, UploadedFile $file, $mensagem = null)
    {
        $this->ocorrencia = $ocorrencia;
        $this->file = $file;
        $this->mensagem = $mensagem;
    }

    public function handle()
    {
        $handler = new HandleUserUploadedFile($this->file);

        // TODO: Ajustar prefeitura. Deve ser dinâmico (multi-tenancy)
        $caminho = $handler->file->storeAs(
            'prefeitura-' . \ByusTechnology\Gabinete\Models\Prefeitura::first()->id, 
            $handler->sluggedFilename, 
            'public'
        );

        $arquivo = new OcorrenciaArquivo;
        $arquivo->user_id = auth()->user()->id;
        $arquivo->caminho = pathinfo($caminho, PATHINFO_DIRNAME);
        $arquivo->arquivo = $handler->sluggedFilename;
        $arquivo->url = url('storage/' . $caminho);
        $arquivo->mime = $handler->mime;

        if ( ! empty($this->mensagem)) {
            $arquivo->ocorrencia_mensagem_id = $this->mensagem->id;
        }

        $this->arquivo = $this->ocorrencia->arquivos()->save($arquivo);

        return $this;
    }

}