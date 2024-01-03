<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;


class DashboardController extends Controller
{
    public function index(){
        //untuk halaman login
        Session::put('title','Dashboard');
        return view('admin/content/dashboard');
    }
}
