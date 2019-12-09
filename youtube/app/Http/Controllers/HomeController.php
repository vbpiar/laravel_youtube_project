<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Youtube;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $video = (new Youtube(env('YOUTUBE_API_KEY')))->getPlaylistItemsByPlaylistId('PLk1mcf4UB6OQF0K7ZVjlyEQzpknfl4DL6');
      var_dump($video);

    }

}
