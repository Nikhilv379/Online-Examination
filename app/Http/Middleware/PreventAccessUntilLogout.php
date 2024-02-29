<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

class PreventAccessUntilLogout
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
        if(Auth::user()->role=='admin') {
            return redirect('/admin/home');
        }

        if(Auth::user()->role=='teacher'){
            return redirect('/teacher/home');
        }
        if(Auth::user()->role=='student'){

            return redirect('/home');
        }
    }
        return $next($request);
        // return $next($loginController);


    }
}
