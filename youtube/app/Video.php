<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    protected $fillable = [
        'videoId', 'publishedAt', 'channel_id','title'
    ];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function getUrl()
    {
        return 'https://www.youtube.com/embed/'.$this->attributes['videoId'];
    }
}
