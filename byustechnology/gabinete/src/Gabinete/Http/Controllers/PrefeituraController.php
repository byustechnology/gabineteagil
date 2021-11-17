<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Actions\CriarPrefeitura;
use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Filters\PrefeituraFilters;
use ByusTechnology\Gabinete\Http\Requests\PrefeituraRequest;

class PrefeituraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\PrefeituraFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(PrefeituraFilters $filters)
    {
        $prefeituras = Prefeitura::filter($filters)->ordenado()->paginate();
        return view('gabinete::prefeitura.index', compact('prefeituras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::prefeitura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\PrefeituraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrefeituraRequest $request)
    {
        $prefeitura = (new Prefeitura)->fill($request->except([
            'user_name',
            'user_email',
            'user_password',
            'user_password_confirmation'
        ]));
        $prefeitura->save();

        $processos = new CriarPrefeitura($prefeitura, $request->all());
        $processos->handle();


        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Prefeitura ' . $prefeitura->titulo . ' adicionada com sucesso!',
                'errors' => false,
                'prefeitura' => $prefeitura
            ]);
        }

        session()->flash('flash_success', 'Prefeitura ' . $prefeitura->titulo . ' adicionado com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Prefeitura  $prefeitura
     * @return \Illuminate\Http\Response
     */
    public function show(Prefeitura $prefeitura)
    {
        $usuarios = $prefeitura->usuarios;
        return view('gabinete::prefeitura.show', compact('prefeitura', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Prefeitura  $prefeitura
     * @return \Illuminate\Http\Response
     */
    public function edit(Prefeitura $prefeitura)
    {
        return view('gabinete::prefeitura.edit', compact('prefeitura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\PrefeituraRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Prefeitura  $prefeitura
     * @return \Illuminate\Http\Response
     */
    public function update(PrefeituraRequest $request, Prefeitura $prefeitura)
    {
        $prefeitura->fill($request->all());
        $prefeitura->update();

        session()->flash('flash_success', 'Prefeitura ' . $prefeitura->titulo . ' atualizado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Prefeitura  $prefeitura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prefeitura $prefeitura)
    {
        if ($prefeitura->ocorrencias->count()) {
            return back()->withErrors(['Desculpe, mas o prefeitura ' . $prefeitura->titulo . ' já está sendo utilizado em uma ocorrência. Altere o prefeitura responsável de todas as ocorrências associadas a este prefeitura, e então faça a remoção.']);
        }

        $prefeitura->delete();
        session()->flash('flash_danger', 'Prefeitura ' . $prefeitura->titulo . ' removido com sucesso!');
        return back();
    }
}
