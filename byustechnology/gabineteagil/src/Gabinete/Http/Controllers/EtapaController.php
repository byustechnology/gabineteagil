<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Etapa;
use ByusTechnology\Gabinete\Filters\EtapaFilters;
use ByusTechnology\Gabinete\Http\Requests\EtapaRequest;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\EtapaFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(EtapaFilters $filters)
    {
        $etapas = Etapa::filter($filters)->ordenado()->paginate();
        return view('gabinete::etapa.index', compact('etapas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::etapa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\EtapaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtapaRequest $request)
    {
        $etapa = (new Etapa)->fill($request->all());
        $etapa->save();

        session()->flash('flash_success', 'Etapa ' . $etapa->titulo . ' adicionada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function show(Etapa $etapa)
    {
        return view('gabinete::etapa.show', compact('etapa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function edit(Etapa $etapa)
    {
        return view('gabinete::etapa.edit', compact('etapa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\EtapaRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function update(EtapaRequest $request, Etapa $etapa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etapa $etapa)
    {
        $etapa->delete();
        session()->flash('flash_danger', 'Etapa ' . $etapa->titulo . ' removida com sucesso!');
        return back();
    }
}
