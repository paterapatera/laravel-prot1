<?php

namespace App\Application\Post\Search;

class ServiceImpl implements Service
{
    function __construct(private Query $query)
    {
    }

    function run(Input $input): Output
    {
        // new Post(new Id(''), new Title('１２３４５６７８９０１２'))
        return new Output($this->query->search());
    }
}
