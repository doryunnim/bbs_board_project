<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qna_article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content'];
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function qna_comments()
    {
        return $this->morphMany(Qna_comment::class, 'commentable');
    }
}
