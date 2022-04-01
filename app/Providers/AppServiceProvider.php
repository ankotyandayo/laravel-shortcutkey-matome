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
            $query_tag = \Request::query('tag');

            if (!empty($query_tag)) {
                $keys = Key::select('keys.*', 'detailtags.*',)
                    ->leftJoin('key_tags', 'key_tags.key_id', '=', 'keys.id')
                    // ->leftJoin('tags', 'key_tags.tag_id', '=', 'tags.id')
                    ->leftJoin('tag_detailtags', 'tag_detailtags.key_id', '=', 'keys.id')
                    ->leftJoin('detailtags', 'tag_detailtags.detailtag_id', '=', 'detailtags.id')
                    ->where('key_tags.tag_id', '=', $query_tag)
                    ->get();
                // dd($keys);
            } else {
                $keys = Key::select('id', 'key_1', 'key_2', 'key_3', 'key_4', 'note', 'content')
                    ->whereNull('deleted_at')
                    ->orderBy('updated_at', 'DESC')
                    ->get();
            }

            $tags = Tag::where('admin_id', '=', \Auth::id())->get();

            $view->with('tags', $tags)->with('keys', $keys);
        });
    }
}
