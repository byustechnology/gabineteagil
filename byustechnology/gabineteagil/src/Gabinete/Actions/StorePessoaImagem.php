<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Actions\HandleUserUploadedFile;
use Illuminate\Http\UploadedFile;

class StorePessoaImagem
{

    protected $pessoa;

    protected $file;

    public $arquivo;

    public function __construct(Pessoa $pessoa, UploadedFile $file)
    {
        $this->pessoa = $pessoa;
        $this->file = $file;
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

        $this->arquivo = $this->pessoa->arquivos()->save($arquivo);

        return $this;
    }

}