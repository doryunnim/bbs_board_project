<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class NabeJapan extends Model
{
    //
    protected $fillable = ['title','content', 'password'];
    public function attachments()
    {
        return $this->hasMany(JapanAttachments::class);
    }
}