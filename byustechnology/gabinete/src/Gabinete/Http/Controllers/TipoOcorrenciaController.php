<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\TipoOcorrencia;
use ByusTechnology\Gabinete\Filters\TipoOcorrenciaFilters;
use ByusTechnology\Gabinete\Http\Requests\TipoOcorrenciaRequest;
use Illuminate\Http\Request;

class TipoOcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\TipoOcorrenciaFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TipoOcorrenciaFilters $filters)
    {
        $tipos = TipoOcorrencia::filter($filters)->ordenado();

        if ($request->wantsJson()) {
            return $tipos->get()->toJson();
        }

        $tipos = $tipos->paginate();
        return view('gabinete::ocorrencia.tipo.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::ocorrencia.tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\TipoOcorrenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoOcorrenciaRequest $request)
    {
        $tipo = (new TipoOcorrencia)->fill($request->all());
        $tipo->prefeitura_id = 1; // TODO: Modificar para a prefeitura logada.        
        $tipo->save();

        session()->flash('flash_success', 'Tipo de ocorrência ' . $tipo->titulo . ' adicionado com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\TipoOcorrencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(TipoOcorrencia $tipo)
    {
        return view('gabinete::ocorrencia.tipo.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\TipoOcorrencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoOcorrencia $tipo)
    {
        return view('gabinete::ocorrencia.tipo.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\TipoOcorrenciaRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\TipoOcorrencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(TipoOcorrenciaRequest $request, TipoOcorrencia $tipo)
    {
        $tipo->fill($request->all());
        $tipo->update();

        session()->flash('flash_success', 'Tipo de ocorrência ' . $tipo->titulo . ' atualizado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\TipoOcorrencia  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoOcorrencia $tipo)
    {
        $tipo->delete();
        session()->flash('flash_danger', 'Tipo de ocorrência ' . $tipo->titulo . ' removida com sucesso!');
        return back();
    }
}
