![Avacha Banner](https://raw.githubusercontent.com/anafro/anafro/main/Banners/Avacha-Hero.png)


<h1 align="center">Meet Avacha</h1>

**Avàcha** (*named after a beautiful bay in Kamchatka, where my city lies*) — 
is a supercharged PHP framework. It supports:

* Routing

```php
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
```

* Controllers

```php
<?php declare(strict_types=1);

namespace App\Controllers;

use Avacha\Http\Controller;
use Avacha\Http\Response;
use function Avacha\Templating\respond_with_template;

class PostsController extends Controller
{
    public function show(int $id): Response
    {
        return respond_with_template('posts', compact('id'));
    }
}
```

* [Latte](https://latte.nette.org/) HTML templates
```latte
{parameters
    int $id,
}

{var $title = "Post #{$id}"}
{layout avacha.latte}

{block body}
    <h1>Post #{$id}</h1>
    <p>Kozelsky has erupted again, damn! 🌋</p>
{/block}
```

* Exception trace on page


## Quick start

### Creating a new project
Clone the repository:
```shell
git clone https://github.com/anafro/avacha my-project
```

Use Docker in order to start...:
```shell
docker compose up -d
```

...and shutdown the web server:
```shell
docker compose down
```

### Creating routes
Go to `routes.php`. There you will find some example routes returned from the file.
To add a new route, create a new object into an array:

```php
// routes.php
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
    
    // Adding a new route:
    new Route(
        method: Request::GET, // GET, POST, PUT, DELETE, PATCH, HEAD, OPTIONS, TRACE, CONNECT
        path: '/user/{id:\d+}', // Path parameters work on regular expressions
        handler: [UsersController::class, 'show'] // Controller class and its method to handle requests
    )
];
```

### Creating controllers
Go to `src/Controllers`, and create a new controller class. Its name should end with `-Controller`:
```php
// src/Controllers/UsersController.php
<?php declare(strict_types=1);

namespace App\Controllers;

use Avacha\Http\Controller;
use Avacha\Http\Response;
use function Avacha\Templating\respond_with_template;

class UsersController extends Controller
{
    public function show(int $id): Response
    {
        return respond_with_template('users', compact('id'));
    }
}
```

The `show($id)` will be called each time `/user/{id}` is visited.

### Creating HTML templates
Avacha is supercharged with Latte templates, making page development a delightful experience.
If you are not familiar with Latte, you definitely have to see its fascinating features: [Latte website](https://latte.nette.org/).

To create a Latte template, go to `/templates`. Create a new template ending with `.latte` extension:

```latte
{parameters
    int $id,
}

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User #{$id}'s profile</title>
</head>
<body>
    <h1>User Info</h1>
    <p>Characteristics:</p>
    <li>
        <ol>Good</ol>
        <ol>Kind</ol>
        <ol>Lovely</ol>
    </li>
</body>
</html>
```

Now your template is available, go to `localhost/users/3`!