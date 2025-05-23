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