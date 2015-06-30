<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class UnConnected {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('connected')){
            return redirect(route('home'))->with('error', "Vous ne pouvez pas accéder à cette page en étant connecté");
        }

        return $next($request);
    }

}
