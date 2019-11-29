<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NabeIntroduce extends Model
{
<<<<<<< HEAD
    protected $guarded = [];
=======
    protected $fillable = ['name', 'comment', 'url'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
}
