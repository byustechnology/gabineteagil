<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Ocorrencia;
use Illuminate\Http\Request;

class MapaController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('gabinete::mapa.index');
    }

}
