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


## Create a new Avacha project
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