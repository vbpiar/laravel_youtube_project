<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //

    protected $table = 'channels';

    protected $fillable = ['id','youtube_token','user_id','last_upload'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function video()
    {
        return $this->hasMany('App\Video');
    }
}
