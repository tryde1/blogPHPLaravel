<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $fillable = [
        'author', 'content'
    ];
}
