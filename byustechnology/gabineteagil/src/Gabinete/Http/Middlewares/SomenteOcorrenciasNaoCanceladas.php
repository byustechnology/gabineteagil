<?php

namespace ByusTechnology\Gabinete\Http\Middlewares;

use Closure;

class SomenteOcorrenciasNaoCanceladas
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
            if ( ! $request->ocorrencia->cancelada()) {
                return $next($request);
            }
        }

        return back()->withErrors(['Desculpe, esta operação não é permitida em ocorrências que estejam canceladas.']);
    }
}
