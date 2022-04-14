<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeysController extends Controller
{
    public function index()
    {
        $query_tag = \Request::query('tag');
        if (!empty($query_tag)) {
            return view(
                'user.keys.index',
            );
        } else {
            return view(
                'user.welcome',
            );
        }
    }
}
