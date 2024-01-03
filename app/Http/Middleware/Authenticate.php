<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
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
    }
}
