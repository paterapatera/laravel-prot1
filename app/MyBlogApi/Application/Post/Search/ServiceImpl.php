<?php

namespace App\MyBlogApi\Application\Post\Search;

class ServiceImpl implements Service
{
    function __construct(private Query $query)
    {
    }

    function run(Input $input): Output
    {
        return new Output($this->query->search());
    }
}
