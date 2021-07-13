<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Assunto;
use ByusTechnology\Gabinete\Filters\AssuntoFilters;
use ByusTechnology\Gabinete\Http\Requests\AssuntoRequest;

class AssuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\AssuntoFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(AssuntoFilters $filters)
    {
        $assuntos = Assunto::filter($filters)->ordenado()->paginate();
        return view('gabinete::assunto.index', compact('assuntos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::assunto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\AssuntoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssuntoRequest $request)
    {
        $assunto = (new Assunto)->fill($request->all());
        $assunto->prefeitura_id = 1; // TODO: Modificar para a prefeitura logada.        
        $assunto->save();

        session()->flash('flash_success', 'Assunto ' . $assunto->titulo . ' adicionado com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function show(Assunto $assunto)
    {
        return view('gabinete::assunto.show', compact('assunto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function edit(Assunto $assunto)
    {
        return view('gabinete::assunto.edit', compact('assunto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\AssuntoRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function update(AssuntoRequest $request, Assunto $assunto)
    {
        $assunto->fill($request->all());
        $assunto->update();

        session()->flash('flash_success', 'Assunto ' . $assunto->titulo . ' atualizado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Assunto  $assunto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assunto $assunto)
    {
        if ($assunto->ocorrencias->count()) {
            return back()->withErrors(['Desculpe, mas o assunto ' . $assunto->titulo . ' já está sendo utilizado em uma ocorrência. Altere o assunto responsável de todas as ocorrências associadas a este assunto, e então faça a remoção.']);
        }

        $assunto->delete();
        session()->flash('flash_danger', 'Assunto ' . $assunto->titulo . ' removido com sucesso!');
        return back();
    }
}
