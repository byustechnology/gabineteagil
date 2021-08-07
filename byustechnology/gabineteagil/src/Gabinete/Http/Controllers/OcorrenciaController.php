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
     * Método construtor da classe
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(\ByusTechnology\Gabinete\Http\Middlewares\SomenteOcorrenciasNaoCanceladas::class)->only(['update', 'destroy']);
        $this->middleware(\ByusTechnology\Gabinete\Http\Middlewares\SomenteOcorrenciasNaoConcluidas::class)->only(['update', 'destroy']);
    }

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
        $ocorrencia = (new Ocorrencia)->fill($request->except('mudar_endereco'));
        $ocorrencia->prefeitura_id = Prefeitura::first()->id; // TODO: Ajustar, deixar dinâmico
        $ocorrencia->titulo = 'Ocorrência de teste'; // TODO: Implementar um título real para a ocorrência
        $ocorrencia->save();
        
        session()->flash('flash_modal_success', 'Ocorrência ' . $ocorrencia->titulo . ' cadastrada com sucesso!');
        session()->flash('flash_modal_success_action', '<a href="' . url($ocorrencia->path()) . '" class="btn btn-outline-primary m-auto btn-sm">Visualizar ocorrência</a>');
        
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
        $ultimasMensagens = $ocorrencia->mensagens()->orderBy('id', 'desc')->limit(3)->get();
        $arquivos = $ocorrencia->arquivos()->ordenado()->get();
        return view('gabinete::ocorrencia.show', compact('ocorrencia', 'ultimasMensagens', 'arquivos'));
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
        $ocorrencia->fill($request->except('mudar_endereco'));
        $ocorrencia->update();

        session()->flash('flash_success', 'Ocorrência alterada com sucesso!');
        return redirect($ocorrencia->path());
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
