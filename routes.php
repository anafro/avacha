<?php declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\PostsController;
use Avacha\Http\Request;
use Avacha\Http\Route;

return [
    new Route(
        method: Request::GET,
        path: '/',
        handler: [HomeController::class, 'index']
    ),
    new Route(
        method: Request::GET,
        path: '/posts/{id:\d+}',
        handler: [PostsController::class, 'show']
    ),
];