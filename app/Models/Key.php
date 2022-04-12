<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;


class Key extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key_1',
        'key_2',
        'key_3',
        'key_4',
        'note',
        'content',
        'admin_id',
    ];

    public function admin()
    {
        // return $this->belongsTo(Admin::class);
    }

    public function getKey()
    {
        $query_tag = \Request::query('tag');

        if (!empty($query_tag)) {
            $keys = Key::select('keys.*', 'tag_detailtags.detailtag_id')
                ->leftJoin('key_tags', 'key_tags.key_id', '=', 'keys.id')
                // ->leftJoin('tags', 'key_tags.tag_id', '=', 'tags.id')
                ->leftJoin('tag_detailtags', 'tag_detailtags.key_id', '=', 'keys.id')
                ->leftJoin('detailtags', 'tag_detailtags.detailtag_id', '=', 'detailtags.id')
                ->where('key_tags.tag_id', '=', $query_tag)
                ->orderBy('detailtag_id', 'ASC')
                ->get();
            // dd($keys);
        } else {

            $keys = Key::select('id', 'key_1', 'key_2', 'key_3', 'key_4', 'note', 'content')
                ->whereNull('deleted_at')
                ->orderBy('updated_at', 'DESC')
                ->get();
        }
        return $keys;
    }
}
