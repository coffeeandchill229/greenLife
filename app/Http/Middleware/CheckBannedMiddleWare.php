<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBannedMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('customer')->user()->banned == 0) {
            Auth::guard('customer')->logout();
            $request->session()->regenerateToken();
            return redirect()->route('home.login')->with('error', 'Tài khoản của bạn đã bị cấm!');
        } else {
            return $next($request);
        }
    }
}
