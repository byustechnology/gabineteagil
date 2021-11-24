<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Actions\HandleUserUploadedFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Image;

class StoreCabecalhoImagem
{

    protected $file;

    public $arquivo;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function handle()
    {
        $handler = new HandleUserUploadedFile($this->file);
        $uploadPath = 'prefeitura-' . \ByusTechnology\Gabinete\Models\Prefeitura::first()->id . '/configuracao/cabecalho';
        $arquivo = 'cabecalho-' . Str::random(16) . '.' . $handler->extension;

        // TODO: Ajustar prefeitura. Deve ser dinâmico (multi-tenancy)
        $caminho = $handler->file->storeAs(
            $uploadPath,
            $arquivo,
            'public'
        );

        $this->arquivo = $uploadPath . '/' . $arquivo;

        return $this;
    }

}