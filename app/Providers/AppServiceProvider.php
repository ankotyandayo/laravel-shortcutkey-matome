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
            // \でインポートしなくても使える
            $query_tag = \Request::query('tag');
            dd($query_tag);

            $tags = Tag::where('admin_id', '=', \Auth::id())->get();

            $view->with('tags', $tags);
        });
    }
}
