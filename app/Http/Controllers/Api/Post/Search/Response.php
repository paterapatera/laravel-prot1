<?php

namespace App\Http\Controllers\Api\Post\Search;

use App\Application\Post\Search\Output;
use App\Domain\Post\Post;

class Response
{
    static public function from(Output $output): array
    {
        return [
            'posts' => $output->posts->map(function (Post $post) {
                $data = $post->toObject();
                return [
                    'id' => $data->id,
                    'title' => $data->title,
                ];
            })
        ];
    }
}
