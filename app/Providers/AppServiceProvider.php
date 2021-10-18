<?php

namespace App\Providers;

use App\Model\FacebookPixel;
use Illuminate\Contracts\Pagination\Paginator;
use App\Model\Category;
use App\Model\TopMenu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();
        View::composer('components.frontend.header', function ($view) {
            $view->with('categories', Category::where('status','=',1)->limit(7)->get());
        });

        View::composer('components.frontend.mobile-menu',function ($view){
            $view->with('categories', Category::where('status','=',1)->get());
        });

        View::composer('components.frontend.header', function ($view) {
            $view->with('top', TopMenu::where('status','=',1)->get());
        });

        View::composer('components.frontend.mobile-menu', function ($view) {
            $view->with('top', TopMenu::where('status','=',1)->get());
        });

        // delete read notifications after 24 hours when page-topbar loaded
        View::composer('admin.layout.header.page-topbar', function ($view) {
            DB::table('notifications')->where('read_at', '<', now()->subDays(1))->delete();
        });

        //setup send pixel id to frontend master
        View::composer('frontend.master.master', function($view) {
            $view->with('pixel', FacebookPixel::first());
        });
    }
}
