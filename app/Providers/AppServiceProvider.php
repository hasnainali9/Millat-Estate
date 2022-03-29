<?php

namespace App\Providers;

use App\Models\LocationCity;
use App\Models\Page;
use App\Models\Project;
use App\Models\Property;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

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
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);


        if(Schema::hasTable('migrations')){
            View::share('sharedCities', LocationCity::where('is_active', 1)->get());
            View::share('sharedFeaturedProjects', Project::where('is_active', 1)->get());
            View::share('sharedRecentProperties', Property::where('is_active', 1)->get());
            View::share('sharedPages', Page::where('is_active', 1)->get());
            View::share('sharedSetting', Setting::first());
            View::share('sharedCategories', Category::where('is_active', 1)->get());
        }
    }
}
