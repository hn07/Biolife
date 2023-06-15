<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    Paginator::useBootstrapFive();
    Paginator::useBootstrapFour();


    $admins = Admin::all();
    // $data = array();
    // $data = Admin::where('id', '=', Session::get('loginId'))->first();
       View::share('admins',$admins);
    }
}
