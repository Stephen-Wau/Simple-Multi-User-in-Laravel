<?php


namespace App\Providers;
use Illuminate\Support\ServiceProvider;


class HelperServiceProvider extends ServiceProvider
{

    public function register()
    {
        require_once app_path().'/Util/Helper.php';
    }

    public function boot()
    {
        //
    }

}
