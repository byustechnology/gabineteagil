<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Actions\StorePessoaImagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PessoaImagemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pessoa $pessoa)
    {
        // Validação da request
        $request->validate([
            'imagem' => 'required|image|dimensions:max_width=1000,max_height=1000'
        ]);

        $imagem = (new StorePessoaImagem($pessoa, $request->imagem))->handle();
        $pessoa->imagem = $imagem->arquivo;
        $pessoa->update();

        session()->flash('flash_success', 'Imagem de perfil de ' . $pessoa->titulo . ' alterada com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pessoa $pessoa)
    {
        Storage::disk('public')->delete($pessoa->imagem);
        
        $pessoa->imagem = null;
        $pessoa->update();

        session()->flash('flash_danger', 'Imagem de perfil de ' . $pessoa->titulo . ' removida com sucesso!');
        return back();
    }
}
