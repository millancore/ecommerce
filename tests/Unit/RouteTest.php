<?php

namespace Tests\Unit;

use Core\Routing\Route;
use PHPUnit\Framework\TestCase;
use Tests\Mock\AddProductActionMock;
use Tests\Mock\AddProductCartStackMock;
use Tests\Mock\ValidateRequestActionMock;
use Tests\Mock\ValidateStockActionMock;

class RouteTest extends TestCase
{
   public function testCreateRoute()
   {
       $route = Route::post('/cart/3', [ // Endpoint: /cart/{cart} {body: product, quantity}
           ValidateRequestActionMock::class,
           ValidateStockActionMock::class,
           AddProductActionMock::class
       ]);

       $this->assertInstanceOf(Route::class, $route);
   }

   public function testAddRouteOneMiddleware()
   {
       $route = Route::post('/cart/3', AddProductActionMock::class);

       $this->assertInstanceOf(Route::class, $route);
   }

   public function testAddRouteStack()
   {
       $route = Route::post('/cart/3', AddProductCartStackMock::class);

       $this->assertInstanceOf(Route::class, $route);
   }

   public function testGroupMiddleware()
   {
       Router::middleware(Auth2Middleware::class)->add(
           Route::post('....'.)
       );
   }
}