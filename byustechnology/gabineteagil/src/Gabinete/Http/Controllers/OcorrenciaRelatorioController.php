<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use Illuminate\Http\Request;
use Exception;

class OcorrenciaRelatorioController extends Controller
{

    public function porAssunto(Request $request)
    {
        return view('gabinete::ocorrencia.relatorio.por-assunto.index');
    }

}
