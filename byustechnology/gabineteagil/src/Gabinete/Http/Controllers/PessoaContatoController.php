<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Models\PessoaContato;
use ByusTechnology\Gabinete\Http\Requests\PessoaContatoRequest;

class PessoaContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function index(Pessoa $pessoa)
    {
        $contatos = $pessoa->contatos;
        return view('gabinete::pessoa.contato.index', compact('pessoa', 'contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function create(Pessoa $pessoa)
    {
        return view('gabinete::pessoa.contato.create', compact('pessoa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\PessoaContatoRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaContatoRequest $request, Pessoa $pessoa)
    {
        $contato = (new PessoaContato)->fill($request->all());
        $pessoa->contatos()->save($contato);

        session()->flash('flash_success', 'Contato ' . $contato->titulo . ' adicionada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @param  \ByusTechnology\Gabinete\Models\PessoaContato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa, PessoaContato $contato)
    {
        return view('gabinete::pessoa.contato.show', compact('pessoa', 'contato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @param  \ByusTechnology\Gabinete\Models\PessoaContato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa, PessoaContato $contato)
    {
        return view('gabinete::pessoa.contato.edit', compact('pessoa', 'contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\PessoaContatoRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @param  \ByusTechnology\Gabinete\Models\PessoaContato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaContatoRequest $request, Pessoa $pessoa, PessoaContato $contato)
    {
        $contato->fill($request->all());
        $contato->update();

        session()->flash('flash_success', 'Contato ' . $contato->titulo . ' alterado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa, PessoaContato $contato)
    {
        $contato->delete();
        session()->flash('flash_danger', 'Contato ' . $contato->titulo . ' removido com sucesso!');
        return back();
    }
}
