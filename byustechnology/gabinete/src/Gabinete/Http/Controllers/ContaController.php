<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContaController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        return view('gabinete::conta.index', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = auth()->user();

        $request->validate([
            'name' => 'sometimes|required', 
            'email' => [
                'sometimes', 
                'required', 
                'email', 
                Rule::unique('users', 'email')->ignore($usuario)
            ], 
            'password' => 'sometimes|required|confirmed|min:6'
        ]);

        $usuario->fill($request->except('password'));
        
        if ($request->has('password')) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->update();

        $mensagem = $request->has('password') ? 'Senha alterada com sucesso. No seu próximo login, utilize a sua nova senha' : 'Dados alterados com sucesso!';

        session()->flash('flash_success', $mensagem);
        return redirect(route('conta.index'));
    }
}
