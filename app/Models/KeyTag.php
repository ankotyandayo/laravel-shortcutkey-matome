<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'key_id',
        'tag_id',
    ];
}
