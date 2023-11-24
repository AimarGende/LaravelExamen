<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Manzana;

class ManzanasEliminadasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $manzana = Manzana::where('id', $request->input('manzana_id'))->first();
        Log::info('Se ha eliminado la manzana con el id' + $manzana->tipoManzana);
        return $next($request);
    }
}
