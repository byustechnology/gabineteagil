<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use ByusTechnology\Gabinete\Actions\FormatarTemplateOcorrencia;
use Illuminate\Http\Request;
use PDF;

class OcorrenciaPdfController extends Controller
{
    
    public function pdf(Ocorrencia $ocorrencia)
    {
        $templateFormatado = (new FormatarTemplateOcorrencia($ocorrencia))->handle();
        
        $pdf = PDF::loadView('gabinete::ocorrencia.pdfs.tipoOcorrencia', compact('ocorrencia', 'templateFormatado'));
        return $pdf->stream('ocorrencia-' . $ocorrencia->id . '.pdf');
    }
}
