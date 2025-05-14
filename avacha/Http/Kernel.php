<?php declare(strict_types=1);

namespace Avacha\Http;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        $routes = Route::all();
        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) use (&$routes) {
            foreach ($routes as $route) {
                $routeCollector->addRoute($route->method, $route->path, $route->handler);
            }
        });

        $method = $request->method;
        $path = $request->path;
        $dispatch = $dispatcher->dispatch($method, $path);
        [$status] = $dispatch;

        switch ($status) {
            case Dispatcher::NOT_FOUND:
                return new Response('Not Found', Response::NOT_FOUND);
            case Dispatcher::METHOD_NOT_ALLOWED:
                return new Response('Method Not Allowed', Response::METHOD_NOT_ALLOWED);
            case Dispatcher::FOUND:
                [$status, [$controller, $controllerMethod], $variables] = $dispatch;
                return Controller::call($controller, $controllerMethod, $variables);
        }

        return new Response('Server Error', Response::INTERNAL_SERVER_ERROR);
    }
}