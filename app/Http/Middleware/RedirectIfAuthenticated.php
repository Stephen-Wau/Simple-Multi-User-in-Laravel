<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()) {

            return redirect('/admin/dashboard');

        } else if (Auth::guard('superadmin')->check()) {

            return redirect('/superadmin/dashboard');

        } else if (Auth::guard('admin-food')->check()) {

            return redirect('/admin-food/dashboard');

        } else if (Auth::guard('admin-barang')->check()) {

            return redirect('/admin-barang/dashboard');

        }

        return $next($request);
    }
}
