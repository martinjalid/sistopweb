<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Administrador;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $administrador = Administrador::find( Auth::id() );
            if( $administrador->perfil() == 'Administrador' && $administrador->opticas()->count() > 1){
                
            }else{
                return redirect( '/'.$administrador->opticas()->first()->id.'/cliente' );
            }
        }

        return $next($request);
    }
}
