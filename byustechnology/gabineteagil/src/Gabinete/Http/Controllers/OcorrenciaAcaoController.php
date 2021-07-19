<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Models\Etapa;
use ByusTechnology\Gabinete\Actions\AvancarEtapaNaOcorrencia;
use Illuminate\Http\Request;
use Exception;

class OcorrenciaAcaoController extends Controller
{

    /**
     * Método construtor da classe.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(\ByusTechnology\Gabinete\Http\Middlewares\SomenteOcorrenciasNaoCanceladas::class);
        $this->middleware(\ByusTechnology\Gabinete\Http\Middlewares\SomenteOcorrenciasNaoConcluidas::class);
    }

    /**
     * Avança uma etapa na ocorrência
     *
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function avancar(Ocorrencia $ocorrencia)
    {
        try {
            $avancar = (new AvancarEtapaNaOcorrencia($ocorrencia))->handle();
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
        
        session()->flash('flash_modal_success', 'Etapa avançada na ocorrência de ' . $ocorrencia->pessoa->titulo . '. Agora a ocorrência está na etapa ' . $avancar->novaEtapa->titulo);
        return back();
    }

    /**
     * Escolhe uma etapa para uma determinada 
     * ocorrência
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function escolher(Request $request, Ocorrencia $ocorrencia)
    {
        $request->validate([
            'etapa' => 'required|exists:etapas,id'
        ]);

        $etapa = Etapa::find($request->etapa);
        $ocorrencia->etapa_id = $etapa->id;
        $ocorrencia->update();
        
        session()->flash('flash_success', 'Etapa modificada na ocorrência de ' . $ocorrencia->pessoa->titulo . '. Agora a ocorrência está na etapa ' . $etapa->titulo);
        return back();
    }

    /**
     * Conclui uma determinada ocorrência
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function concluir(Request $request, Ocorrencia $ocorrencia)
    {
        $request->validate([
            'concluida_em' => 'required|date', 
        ]);

        $ocorrencia->concluida_em = $request->concluida_em ?? now();
        $ocorrencia->concluida_por = auth()->user()->id;
        $ocorrencia->concluida_observacao = $request->concluida_observacao;
        $ocorrencia->update();
        
        session()->flash('flash_success', 'Ocorrência de ' . $ocorrencia->pessoa->titulo . ' concluída com sucesso!');
        return back();
    }

    /**
     * Cancela uma determinada ocorrência
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ByusTechnology\Gabinete\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function cancelar(Request $request, Ocorrencia $ocorrencia)
    {
        $request->validate([
            'confirmacao' => 'required', 
            'cancelada_observacao' => 'required'
        ]);

        $ocorrencia->cancelada_em = now();
        $ocorrencia->cancelada_observacao = $request->cancelada_observacao;
        $ocorrencia->cancelada_por = auth()->user()->id;
        $ocorrencia->update();
        
        session()->flash('flash_success', 'Ocorrência de ' . $ocorrencia->pessoa->titulo . ' cancelada com sucesso!');
        return back();
    }
}
