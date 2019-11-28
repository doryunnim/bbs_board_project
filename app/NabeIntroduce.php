<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NabeIntroduce extends Model
{
    protected $fillable = ['name', 'comment', 'url'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
