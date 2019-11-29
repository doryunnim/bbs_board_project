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
    public function nabe_introduce()
    {
        return $this->hasMany(NabeIntroduce::class);
    }

    public function isAdmin(){
        return ($this->id ===1) ? true : false;
    }

    public function qna_comments()
    {
        return $this->hasMany(Qna_comment::class);
    }
}
