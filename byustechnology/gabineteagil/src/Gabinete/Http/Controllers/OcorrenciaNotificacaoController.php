<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use Illuminate\Http\Request;

class OcorrenciaNotificacaoController extends Controller
{

    public function whatsApp(Request $request, Ocorrencia $ocorrencia)
    {
        $request->validate([
            'mensagem' => 'required', 
            'numero' => 'required'
        ]);

        return redirect('https://api.whatsapp.com/send?phone=55' . $request->numero . '&text=Hello');
    }

}
