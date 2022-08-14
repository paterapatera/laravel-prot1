<?php

namespace App\Http\Controllers\MyBlogApi\Post\Search;

use App\MyBlogApi\Application\Post\Search\Output;
use App\MyBlogApi\Domain\Post\Post;

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
