<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckCategories
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
        if( 
            $request->route()->getName() !== 'Kategorite' &&
            $request->method() === 'GET' &&
            Auth::check() &&
            Auth::user()->numberOf("SelectedCategory") < 5 
        ){
            return redirect('Kategorite');
        } 
        return $next($request);
    }
}
