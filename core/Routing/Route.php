<?php

namespace Core\Routing;

class Route
{
    public function __construct(
        private string $method,
        private string $url,
        private $stackMiddleware
    )
    {

    }


    static function post(string $url, mixed $stackMiddleware) : self
    {
        return new static('POST', $url, $stackMiddleware);
    }

    public function add() : self
    {

    }
}