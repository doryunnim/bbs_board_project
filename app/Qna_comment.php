<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qna_comment extends Model
{
    protected $fillable = ['name', 'slug'];

    public function qna_articles()
    {
        return $this->belongsToMany(Qna_article::class);
    }
}
