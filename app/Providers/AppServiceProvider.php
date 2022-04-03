<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Key;
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
            $key_model = new Key(); //インスタンス化
            $keys = $key_model->getKey();
            $tags = Tag::where('admin_id', '=', \Auth::id())->get();
            // dd($keys);
            $view->with('tags', $tags)->with('keys', $keys);
        });
    }
}
