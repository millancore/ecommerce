<?php

namespace Tests\Mock;

class ValidateRequestActionMock
{
    public function __invoke()
    {
        $productRepository = app(ProductRepositoryInterface::class);

        $product = $productRepository->get(22);
    }



}