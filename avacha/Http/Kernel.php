<?php declare(strict_types=1);

namespace Avacha\Http;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public readonly Request $request;

    public function handle(Request $request): Response
    {
        $this->request = $request;

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
                return respond_with_status(Response::NOT_FOUND);
            case Dispatcher::METHOD_NOT_ALLOWED:
                return respond_with_status(Response::METHOD_NOT_ALLOWED);
            case Dispatcher::FOUND:
                [$status, [$controller, $controllerMethod], $variables] = $dispatch;
                return Controller::call($controller, $controllerMethod, $variables);
        }

        return respond_with_status(Response::INTERNAL_SERVER_ERROR);
    }
}