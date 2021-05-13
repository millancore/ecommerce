<?php

class Paypal
{
    public function __construct(
        private string $apiUrl,
        private string $method = 'Credit',
        private string $cardNumber
    ){}
}

$paypal = new Paypal(
    apiUrl: '//paypal',
    cardNumber: '3123213123123'
);

var_dump($paypal);