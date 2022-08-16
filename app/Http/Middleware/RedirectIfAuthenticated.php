<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;




        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {


                if(Auth::user()->hasRole('admin')){
                    return redirect('/admin_dashboard');
                   }

                   elseif(Auth::user()->hasRole('agent')){
                    return redirect('/agent_dashboard');
                   }

                   elseif(Auth::user()->hasRole(3)){
                    return redirect('/liasonperson_dashboard');
                   }

                   elseif(Auth::user()->hasRole(4)){

                    return redirect('/client_dashboard');
                   }

                   else{
                    return redirect('/home');
                   }
            }
        }

        return $next($request);
    }
}
