<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Usuario;
use ByusTechnology\Gabinete\Filters\UsuarioFilters;
use ByusTechnology\Gabinete\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\UsuarioFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(UsuarioFilters $filters)
    {
        $usuarios = Usuario::filter($filters)->ordenado()->paginate();
        return view('gabinete::usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\UsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = (new Usuario)->fill($request->all());
        $usuario->save();

        session()->flash('flash_success', 'Usuario ' . $usuario->name . ' adicionada com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('gabinete::usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('gabinete::usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\UsuarioRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $usuario->fill($request->except('password'));

        if ( ! empty($request->password)) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->update();
        session()->flash('flash_success', 'Usuário ' . $usuario->name . ' alterado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        session()->flash('flash_danger', 'Usuario ' . $usuario->name . ' removida com sucesso!');
        return back();
    }
}
