<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Filters\OcorrenciaFilters;
use ByusTechnology\Gabinete\Http\Requests\OcorrenciaRequest;

class OcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\OcorrenciaFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(OcorrenciaFilters $filters)
    {
        $ocorrencias = Ocorrencia::filter($filters)->ordenado()->paginate();
        return view('gabinete::ocorrencia.index', compact('ocorrencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::ocorrencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\OcorrenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OcorrenciaRequest $request)
    {
        $ocorrencia = (new Ocorrencia)->fill($request->all());
        $ocorrencia->prefeitura_id = Prefeitura::first()->id; // TODO: Ajustar, deixar dinâmico
        $ocorrencia->titulo = 'Ocorrência de teste';
        $ocorrencia->save();

        session()->flash('flash_success', 'Ocorrência ' . $ocorrencia->titulo . ' cadastrada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function show(Ocorrencia $ocorrencia)
    {
        return view('gabinete::ocorrencia.show', compact('ocorrencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocorrencia $ocorrencia)
    {
        return view('gabinete::ocorrencia.edit', compact('ocorrencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\OcorrenciaRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function update(OcorrenciaRequest $request, Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocorrencia $ocorrencia)
    {
        $ocorrencia->delete();
        session()->flash('flash_danger', 'Ocorrencia ' . $ocorrencia->titulo . ' removida com sucesso!');
        return back();
    }
}
