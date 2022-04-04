<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailtag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'admin_id',
    ];

    public function getDetailtag()
    {
        $query_tag = \Request::query('tag');

        if (!empty($query_tag)) {
            $detailtags = Detailtag::select('detailtags.*',)
                ->leftJoin('tag_detailtags', 'tag_detailtags.detailtag_id', '=', 'detailtags.id')
                ->groupBy('detailtag_id')
                ->where('tag_id', '=', $query_tag)
                ->orderBy('id', 'DESC')
                ->get();
            dd($detailtags);
        } else {
            $detailtags = Detailtag::where('admin_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();
        }
        return $detailtags;
    }
}
