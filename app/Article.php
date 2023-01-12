<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $table = 'article';
    protected $primaryKey = 'id';

    protected $fillable = [
        'author', 'content'
    ];
}
