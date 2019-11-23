<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NabeJapan extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['title','content', 'password'];
}