<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JapanAttachments extends Model
{
    //
    protected $fillable = ['filename', 'bytes', 'mime'];

    public function japan()
    {
        return $this->belongsTo(NabeJapan::class);
    }

    public function getBytesAttribute($value)
    {
        return format_filesize($value);
    }

    public function getUrlAttribute()
    {
        return url('storage/'.$this->filename);
    }
}
