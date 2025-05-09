<?php declare(strict_types=1);

namespace Avacha\Framework\Http;

class Controller
{
    public static function call(string $controllerClass, string $controllerMethod, array $variables): Response
    {
        return call_user_func_array([new $controllerClass, $controllerMethod], $variables);
    }
}