<?php

namespace Tests\Mock;

class GenericActionMock implements MiddlewareInterface
{
    public function __construct(StackMiddlewareInterface $stack, string $resolver)
    {
    }

    public function process()

}