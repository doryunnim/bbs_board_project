<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function qna_article()
    {
        return $this->hasMany(Qna_article::class);
    }
<<<<<<< HEAD
=======
    public function nabe_introduce()
    {
        return $this->hasMany(NabeIntroduce::class);
    }
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718

    public function isAdmin(){
        return ($this->id ===1) ? true : false;
    }
<<<<<<< HEAD
=======

    public function qna_comments()
    {
        return $this->hasMany(Qna_comment::class);
    }
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
}
