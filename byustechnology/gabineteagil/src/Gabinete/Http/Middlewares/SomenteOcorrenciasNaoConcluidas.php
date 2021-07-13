<?php

namespace ByusTechnology\Gabinete\Http\Middlewares;

use Closure;

class SomenteOcorrenciasNaoConcluidas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->ocorrencia) {
            if ( ! $request->ocorrencia->concluida()) {
                return $next($request);
            }
        }

        return back()->withErrors(['Desculpe, esta operação não é permitida em ocorrências que estejam concluídas.']);
    }
}
