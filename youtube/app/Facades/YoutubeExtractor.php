<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class YoutubeExtractor extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'extractor';
    }
}