<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\OcorrenciaArquivo;
use ByusTechnology\Gabinete\Http\Requests\OcorrenciaArquivoRequest;

class OcorrenciaArquivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function index(Ocorrencia $ocorrencia)
    {
        $arquivos = $ocorrencia->arquivos;
        return view('gabinete::ocorrencia.arquivo.index', compact('ocorrencia', 'arquivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function create(Ocorrencia $ocorrencia)
    {
        return view('gabinete::ocorrencia.arquivo.create', compact('ocorrencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\OcorrenciaArquivoRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function store(OcorrenciaArquivoRequest $request, Ocorrencia $ocorrencia)
    {
        $arquivo = (new OcorrenciaArquivo)->fill($request->all());
        $ocorrencia->arquivos()->save($arquivo);

        session()->flash('flash_success', 'Contato ' . $arquivo->titulo . ' adicionada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @param  \ByusTechnology\Gabinete\Models\OcorrenciaArquivo  $arquivo
     * @return \Illuminate\Http\Response
     */
    public function show(Ocorrencia $ocorrencia, OcorrenciaArquivo $arquivo)
    {
        return view('gabinete::ocorrencia.arquivo.show', compact('ocorrencia', 'arquivo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocorrencia $ocorrencia, OcorrenciaArquivo $arquivo)
    {
        $arquivo->delete();
        session()->flash('flash_danger', 'Arquivo ' . $arquivo->titulo . ' removido com sucesso da ocorrência!');
        return back();
    }
}
