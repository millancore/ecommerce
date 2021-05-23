<?php

include_once __DIR__. '/../bootstrap.php';

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response;

# Services Container

//$request = Request::createFromGlobals();

// Router
  # -> Router Collection
  # -> Matcher
  # -> Controller Dispatcher

// map a route

class Request extends SymfonyRequest
{
    public function all(): array
    {
      return $this->request->all();
    }
}

$request = Request::createFromGlobals();

class HomeController {
    public function index() {
        echo 'Hello!';
    }
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) use ($request) {
    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    $r->addRoute('POST', '/api/cart/{id:\d+}', function ()  use ($request){
        //var_dump($request->request->get('product'));
        //$_POST = json_decode(file_get_contents('php://input'), true);
        var_dump($request->all());
        echo 'Product added!';
    });
});

$httpMethod = $request->getMethod();
$uri = $request->getRequestUri();

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

[$method, $handler, $args] = $routeInfo;

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        break;
}

$handler();

//$controller = new $handler[0];
//$controller->{$handler[1]}();

# Controllers

  # Model - ORM
  # Views

# Response
