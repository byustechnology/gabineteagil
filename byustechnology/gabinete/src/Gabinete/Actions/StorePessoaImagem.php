<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Actions\HandleUserUploadedFile;
use Illuminate\Http\UploadedFile;
use Image;
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
        $uploadPath = 'prefeitura-' . \ByusTechnology\Gabinete\Models\Prefeitura::first()->id . '/pessoa/' . $this->pessoa->id;

        // TODO: Ajustar prefeitura. Deve ser dinâmico (multi-tenancy)
        $caminho = $handler->file->storeAs(
            $uploadPath, 
            'profile.' . $handler->extension, 
            'public'
        );
        
        $img = Image::make(storage_path('/app/public/' . $uploadPath . '/' . 'profile.' . $handler->extension));
        $img->fit(512);
        $img->save(null, 60);

        $this->arquivo = $uploadPath . '/' . 'profile.' . $handler->extension;
        
        return $this;
    }

}