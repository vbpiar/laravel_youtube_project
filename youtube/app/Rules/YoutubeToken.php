<?php

namespace App\Rules;

use Alaouy\Youtube\Youtube;
use Illuminate\Contracts\Validation\Rule;

class YoutubeToken implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = (new Youtube(env('YOUTUBE_API_KEY')))->getChannelById($value);
         return $response ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The string must be id of your youtube chanel!';
    }
}
