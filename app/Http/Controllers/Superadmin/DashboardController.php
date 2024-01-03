<?php


namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use Session;


class DashboardController extends Controller
{
    public function index(){
        //untuk halaman login
//        return view('superadmin/dashboard');
        Session::put('title','Dashboard');
        return view('superadmin/content/dashboard');
    }
}
