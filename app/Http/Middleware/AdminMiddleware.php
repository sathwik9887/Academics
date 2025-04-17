<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{

    if (Auth::guard('admin')->check()) {
        return $next($request);
    }


    Auth::guard('admin')->logout();

    return redirect()->route('admin.auth.login')->withErrors([
        'email' => 'Please enter the Credentials.',
    ]);
}
}
