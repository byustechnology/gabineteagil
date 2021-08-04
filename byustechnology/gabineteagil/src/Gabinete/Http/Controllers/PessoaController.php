<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Models\PessoaContato;
use ByusTechnology\Gabinete\Filters\PessoaFilters;
use ByusTechnology\Gabinete\Http\Requests\PessoaRequest;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\PessoaFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(PessoaFilters $filters)
    {
        $pessoas = Pessoa::filter($filters)->ordenado()->paginate();
        return view('gabinete::pessoa.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::pessoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\PessoaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        $pessoa = (new Pessoa)->fill($request->except(['email', 'telefone', 'celular']));
        $pessoa->prefeitura_id = 1; // TODO: Modificar para a prefeitura logada.        
        $pessoa->save();

        // Verificando os contatos preenchidos no formulário.
        if ( ! empty($request->email)) {
            $pessoa->contatos()->save(new PessoaContato([
                'titulo' => 'E-mail', 
                'valor' => $request->email, 
                'tipo' => 'email'
            ]));
        }

        if ( ! empty($request->telefone)) {
            $pessoa->contatos()->save(new PessoaContato([
                'titulo' => 'Telefone', 
                'valor' => $request->telefone, 
                'tipo' => 'fixo'
            ]));
        }

        if ( ! empty($request->celular)) {
            $pessoa->contatos()->save(new PessoaContato([
                'titulo' => 'Celular', 
                'valor' => $request->celular, 
                'tipo' => 'cel'
            ]));
        }

        session()->flash('flash_success', 'Pessoa ' . $pessoa->titulo . ' adicionada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        return view('gabinete::pessoa.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        return view('gabinete::pessoa.edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\PessoaRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaRequest $request, Pessoa $pessoa)
    {
        $pessoa->fill($request->all());
        $pessoa->update();

        session()->flash('flash_success', 'Pessoa ' . $pessoa->titulo . ' atualizado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        if ($pessoa->ocorrencias->count()) {
            return back()->withErrors(['Desculpe, mas a pessoa ' . $pessoa->titulo . ' já está sendo utilizado em uma ocorrência. Não é possível remover a pessoa pois a ocorrência irá perder a associação com ela.']);
        }

        $pessoa->delete();
        session()->flash('flash_danger', 'Pessoa ' . $pessoa->titulo . ' removido com sucesso!');
        return back();
    }
}
