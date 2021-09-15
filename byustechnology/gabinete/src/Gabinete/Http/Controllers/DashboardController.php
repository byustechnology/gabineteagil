<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Retorna a página inicial
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gabinete::dashboard');
    }
}
