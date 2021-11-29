<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Actions\FormatarTemplateOcorrencia;
use ByusTechnology\Gabinete\Models\Configuracao;
use Illuminate\Http\Request;
use PDF;

class OcorrenciaPdfController extends Controller
{

    public function pdf(Ocorrencia $ocorrencia)
    {
        $configuracao = Configuracao::where('prefeitura_id', auth()->user()->prefeitura_id)->first();
        $templateFormatado = (new FormatarTemplateOcorrencia($ocorrencia))->handle();

        dd($templateFormatado);

        $pdf = PDF::loadView('gabinete::ocorrencia.pdfs.tipoOcorrencia', compact('ocorrencia', 'templateFormatado', 'configuracao'));
        return $pdf->stream('ocorrencia-' . $ocorrencia->id . '.pdf');
    }
}
