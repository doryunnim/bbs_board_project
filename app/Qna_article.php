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
<<<<<<< HEAD
=======
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

<<<<<<< HEAD
    

    public function qna_comment()
=======

    public function qna_comments()
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
    {
        return $this->morphMany(Qna_comment::class, 'commentable');
    }
}
