<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckAdmin
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

        $user = Auth::user() ;


        if ( !isset($user) || $user->level == 'kasir' )
        {
            // return '/home';

            return redirect("/")->with('status', 'Kamu harus Login!');
        }
        return $next($request);
    }
}
