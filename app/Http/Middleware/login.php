<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login
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
        $userr = Auth::guard('userr')->user();
        $pemerintah = Auth::guard('pemerintah')->user();
        $adm = Auth::guard('adm')->user();

        if (Auth::guard('userr')->check()) {
            return $next($request);
        } else if (Auth::guard('pemerintah')->check()) {
            return $next($request);
        } else if (Auth::guard('adm')->check()) {
            return $next($request);
        } else {
            // return redirect()->with(['error' => 'Login Gagal']);
            return redirect()->route('login');
        }
    }
}
