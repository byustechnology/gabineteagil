<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Usuario;
use ByusTechnology\Gabinete\Filters\UsuarioFilters;
use ByusTechnology\Gabinete\Http\Requests\UsuarioRequest;
use ByusTechnology\Gabinete\Scopes\PrefeituraScope;

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
        $usuario->type = $request->type; // Aplicamos o type aqui pois o model padrão User não tem type no fillable.
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

        if ( $request->has('type')) {
            $usuario->type = $request->type; // Aplicamos o type aqui pois o model padrão User não tem type no fillable.
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

    /**
     * Impersonate user. This method is only
     * avaliable to system admins.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function personificar(Usuario $usuario)
    {

        $personificadoId = auth()->user()->id;
        session()->put('personificado', $personificadoId);
        auth()->loginUsingId($usuario->id);

        session()->flash('flash_success', 'Você está personificado como <strong>' . $usuario->name . '</strong>. Todas as ações tomadas serão em nome deste usuário.');
        return redirect(config('gabinete.path'));
    }

    /**
     * Leave impersonated user. This method is only
     * avaliable to system admins.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function despersonificar()
    {

        if ( ! session()->has('personificado')) {
            abort(403, 'Você não tem permissão para despersonificar um usuário');
        }

        auth()->login(Usuario::withoutGlobalScope(PrefeituraScope::class)->find(session()->get('personificado')));
        session()->forget('personificado');

        session()->flash('flash_success', 'Você foi despersonificado e agora está utilizando o usuário <strong>' . auth()->user()->name . '</strong>');
        return redirect(config('gabinete.path'));
    }
}
