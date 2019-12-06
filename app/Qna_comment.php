<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qna_comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['commentable_type', 'commentable_id', 
                            'user_id', 'parent_id', 'content',];

    protected $hidden = [
        'user_id',
        'commentable_type',
        'commentable_id',
        'parent_id',
    ];

    protected $with = ['user',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany(Qna_comment::class, 'parent_id')->latest();
    }


    public function parent()
    {
        return $this->belongsTo(Qna_comment::class, 'parent_id', 'id');
    }
}
