<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Avacha\Framework\Http\Controller;
use Avacha\Framework\Http\Response;

class PostsController extends Controller
{
    public function show(int $id): Response
    {
        $content = <<<HTML
        <h1>Post #$id</h1>
        <p>Kozelsky has erupted again, damn! 🌋</p>
        HTML;

        return new Response($content);
    }
}