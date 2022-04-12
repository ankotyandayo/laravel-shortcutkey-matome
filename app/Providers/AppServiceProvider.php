<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Key;
use App\Models\Tag;
use App\Models\Detailtag;


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

            $detailtag_model = new Detailtag(); //インスタンス化
            $detailtags = $detailtag_model->getdetailtag();
            $tags = Tag::where('admin_id', '=', \Auth::id())
                ->orderBy('id', 'ASC')
                ->get();

            $view->with([
                "keys" => $keys,
                "tags" => $tags,
                "detailtags" => $detailtags,
            ]);
        });
    }
}
