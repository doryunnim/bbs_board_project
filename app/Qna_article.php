<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qna_article extends Model
{
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qna_comments()
    {
        return $this->belongsToMany(Qna_comment::class);
    }
}
