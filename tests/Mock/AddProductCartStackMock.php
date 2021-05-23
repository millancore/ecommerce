<?php

namespace Tests\Mock;

class AddProductCartStackMock implements
{
    public function stack()
    {
        return [
            fn() => new GenericActionMock($this, 'validateRequestAction'),
            fn() => new GenericActionMock($this, 'validateStockAction'),
            fn() => $this->addProductCart()
        ];
    }

    private function validateRequestAction()
    {

    }

    private function validateStockAction()
    {

    }

    private function addProductCart()
    {

    }

}