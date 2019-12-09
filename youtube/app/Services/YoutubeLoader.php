<?php


namespace App\Services;


use Alaouy\Youtube\Youtube;
use App\Channel;
use Carbon\Carbon;

class YoutubeLoader
{

    public function needToUpload(Channel $channel,$attribute)
    {
     if ($channel->last_upload < $attribute ){
         return true;
     }
     return false;
    }


    public function uploadAllChannelVideo(Channel $channel)
    {
        $params = [
            'q' => null,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 50,
            'channelId' => $channel->youtube_token
        ];

        do {


            $video = (new Youtube(env('YOUTUBE_API_KEY')))
                ->searchAdvanced($params, true);


            foreach ($video['results'] as $value) {

//dd($video);exit();

                $channel->video()->updateOrCreate(
                    [
                        'videoId' => $value->id->videoId,
                        'publishedAt' => Carbon::parse($value->snippet->publishedAt),
                        'title' => $value->snippet->title,
                    ]
                );


            }


            if (isset($video['info']['nextPageToken'])) {
                $params['pageToken'] = $video['info']['nextPageToken'];
            }
        } while ($video['info']['nextPageToken'] != null);

        return true;
    }
}