<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        return view('gabinete::configuracao.index');
    }
}
