<?php

namespace App\Http\Controllers\MyBlog\Post\Search;

use App\MyBlog\Application\Post\Search\Output;
use App\MyBlog\Domain\Post\Post;

class Response
{
    static public function from(Output $output): array
    {
        return [
            'posts' => $output->posts->map(function (Post $post) {
                $data = $post->val();
                return [
                    'id' => $data->id,
                    'title' => $data->title,
                ];
            })
        ];
    }
}
