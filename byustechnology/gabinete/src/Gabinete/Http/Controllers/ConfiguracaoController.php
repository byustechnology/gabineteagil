<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Actions\StoreCabecalhoImagem;
use ByusTechnology\Gabinete\Models\Configuracao;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        $configuracao = Configuracao::where('prefeitura_id', auth()->user()->prefeitura_id)->first();
        return view('gabinete::configuracao.index', compact('configuracao'));
    }

    public function store(Request $request)
    {

        $cabecalho = (new StoreCabecalhoImagem($request->cabecalho))->handle();

        Configuracao::firstOrCreate([
            'prefeitura_id' => auth()->user()->prefeitura_id,
            'ocorrencia_template_cabecalho' => $cabecalho->arquivo
        ]);

        session()->flash('flash_success', 'Configurações atualizadas com sucesso');
        return back();

    }
}
