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
            $detailtags = Detailtag::select('detailtags.id', 'detailtags.name')
                ->leftJoin('tag_detailtags', 'tag_detailtags.detailtag_id', '=', 'detailtags.id')
                ->where('tag_id', '=', $query_tag)
                ->orderBy('id', 'ASC')
                ->groupBy('id', 'name')
                ->get();
        } else {
            $detailtags = Detailtag::orderBy('id', 'ASC')->get();
        }
        return $detailtags;
    }
}
