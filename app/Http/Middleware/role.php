<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->role, $roles)) {
            if ($request->session()->has('locale')) { // jika 
                App::setLocale($request->session()->get('locale'));
                Config::set('app.locale', session('locale'));
            }
            return $next($request);
            // ini untuk url id segala macem
            // else if ($request->segment(2)) { //jika segment 2 atau prefix 2 == en / id
            //     App::setLocale($request->segment(2)); // set locale seuai prefix nya
            //     return $next($request); // request next
            // } 
        }

        return back();
    }
}
