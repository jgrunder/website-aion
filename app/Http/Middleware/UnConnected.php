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
            return redirect(route('page.error'))->with('error', "You can't access to this page when you are connected");
        }

        return $next($request);
    }

}
