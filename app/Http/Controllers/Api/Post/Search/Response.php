<?php

namespace App\Http\Controllers\Api\Post\Search;

use App\Application\Post\Search\Output;
use App\Domain\Post\Post;

class Response
{
    static public function make(Output $output): array
    {
        return [
            'posts' => $output->posts->map(function (Post $post) {
                return [
                    'id' => $post->id->get(),
                    'title' => $post->title->get(),
                ];
            })
        ];
    }
}
