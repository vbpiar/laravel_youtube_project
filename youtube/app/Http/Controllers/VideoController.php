<?php

namespace App\Http\Controllers;

use App\Facades\YoutubeExtractor;
use App\User;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;


class VideoController extends Controller
{

    public function index()
    {
       $videos =  Video::paginate(5);
        // if video data was upload more than "env('DAYS_FOR_CACHE')" re download from youtube
        foreach ($videos as $video) {
            YoutubeExtractor::needToUpload($video->channel()->first(), Carbon::now()->ceil()->days(env('DAYS_FOR_CACHE')))?
                YoutubeExtractor::uploadAllChannelVideo($video->channel()->first()):true;
        }
        return view('video.all_videos',['videos'=>$videos]);
    }

    public function show(Request $request)
    {
        $request->validate([
            'id'=>'integer'
        ]);
        $channel = User::findOrFail($request['id'])->channel()->first();


            // if video data was upload more than "env('DAYS_FOR_CACHE')" re download from youtube
            YoutubeExtractor::needToUpload($channel, Carbon::now()->ceil()->days(env('DAYS_FOR_CACHE')))?
            YoutubeExtractor::uploadAllChannelVideo($channel):
            true;

            $videos =  $channel->video()->paginate(5);

        return view('video.videos',['videos'=>$videos]);
    }

}
