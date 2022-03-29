<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tag;


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
        view()->composer('*', function ($view) {
            $tags = Tag::where('admin_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();

            $view->with('tags', $tags);
        });
    }
}
