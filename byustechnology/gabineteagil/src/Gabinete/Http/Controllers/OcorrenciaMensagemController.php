<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Actions\StoreOcorrenciaArquivo;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\OcorrenciaMensagem;
use ByusTechnology\Gabinete\Http\Requests\OcorrenciaMensagemRequest;

class OcorrenciaMensagemController extends Controller
{

        /**
     * Método construtor da classe
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(\ByusTechnology\Gabinete\Http\Middlewares\SomenteOcorrenciasNaoCanceladas::class);
        $this->middleware(\ByusTechnology\Gabinete\Http\Middlewares\SomenteOcorrenciasNaoConcluidas::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function index(Ocorrencia $ocorrencia)
    {
        $mensagens = $ocorrencia->mensagens;
        return view('gabinete::ocorrencia.mensagem.index', compact('ocorrencia', 'mensagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function create(Ocorrencia $ocorrencia)
    {
        return view('gabinete::ocorrencia.mensagem.create', compact('ocorrencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\OcorrenciaMensagemRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function store(OcorrenciaMensagemRequest $request, Ocorrencia $ocorrencia)
    {
        $mensagem = (new OcorrenciaMensagem)->fill($request->except('arquivo'));
        $mensagem->user_id = auth()->user()->id;
        $mensagem = $ocorrencia->mensagens()->save($mensagem);

        if ($request->has('arquivo')) {
            (new StoreOcorrenciaArquivo($ocorrencia, $request->arquivo, $mensagem))->handle();
        }

        session()->flash('flash_success', 'Mensagem adicionada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @param  \ByusTechnology\Gabinete\Models\OcorrenciaMensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show(Ocorrencia $ocorrencia, OcorrenciaMensagem $mensagem)
    {
        return view('gabinete::ocorrencia.mensagem.show', compact('ocorrencia', 'mensagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @param  \ByusTechnology\Gabinete\Models\OcorrenciaMensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocorrencia $ocorrencia, OcorrenciaMensagem $mensagem)
    {
        return view('gabinete::ocorrencia.mensagem.edit', compact('ocorrencia', 'mensagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\OcorrenciaMensagemRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @param  \ByusTechnology\Gabinete\Models\OcorrenciaMensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(OcorrenciaMensagemRequest $request, Ocorrencia $ocorrencia, OcorrenciaMensagem $mensagem)
    {
        $mensagem->fill($request->all());
        $mensagem->update();

        session()->flash('flash_success', 'Contato ' . $mensagem->titulo . ' alterado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocorrencia $ocorrencia, OcorrenciaMensagem $mensagem)
    {
        $mensagem->delete();
        session()->flash('flash_danger', 'Contato ' . $mensagem->titulo . ' removido com sucesso!');
        return back();
    }
}
