<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Filters\OcorrenciaFilters;
use Illuminate\Http\Request;
use Exception;

class OcorrenciaRelatorioController extends Controller
{

    public function porAssunto(Request $request, OcorrenciaFIlters $filters)
    {
        if ( ! empty($request->all())) {
            $request->validate([
                'inicio' => 'required|date', 
                'termino' => 'required|date|after_or_equal:inicio'
            ]);
            
            $ocorrencias = Ocorrencia::with('assunto')->filter($filters)->get();
            $assuntos = $ocorrencias->groupBy('assunto.titulo');

            return view('gabinete::ocorrencia.relatorio.por-assunto.show', compact('assuntos'));
        }

        return view('gabinete::ocorrencia.relatorio.por-assunto.index');
    }

}
