<?php declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Avacha\Framework\Http\Request;
use Avacha\Framework\Http\Route;

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