<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Garantindo que enquanto houver na session o login bem sucedido o usuário não poderá ver a página de login novamente
        if ($request->path()=='login' && $request->session()->has('user')) {
            return redirect('/');
        }
        return $next($request);
    }
}
