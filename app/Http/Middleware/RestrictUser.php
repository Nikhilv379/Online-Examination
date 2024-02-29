<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestrictUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     $user = \Auth::user();

    //     if ($user) {
    //         $route = $request->route()->getName();


    //         if ($route === 'admin.home' && $user->role == 'admin') {
    //             return redirect()->route('admin.home')->with('error', 'Unauthorized access.');
    //         } elseif ($route === 'teacher.home' && $user->role == 'teacher') {
    //             return redirect()->route('teacher.home')->with('error', 'Unauthorized access.');
    //         } elseif ($route === 'user.dashboard' && $user->role == 'student') {
    //             return redirect()->route('home')->with('error', 'Unauthorized access.');
    //         }


    //         return $next($request);
    //     }

    //     return redirect()->route('login');
    // }

    public function handle($request, Closure $next)
    {
        if(Auth::check()){
        if(Auth::user()->role=='teacher' || Auth::user()->role=='admin' ) {
            return $next($request);
        }

        // if(Auth::user()->role=='student'&& route=='teacher.home'|| route=='admin.home'){
            return redirect()->back();
        // }
    }
}
}

