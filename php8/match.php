<?php

interface Payment {}
class Paypal implements Payment {}
class Stripe implements Payment {}

 function resolve($payment) : Payment|String
 {
     return match ($payment) {
         'paypal' => new Paypal(),
         'stripe' => new Stripe(),
     };
 }

  var_dump(resolve('paypal'));