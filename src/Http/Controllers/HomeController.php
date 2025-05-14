<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Avacha\Http\Controller;
use Avacha\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $content = <<<HTML
        <h1>Welcome to Avacha!</h1>
        <p>A supercharged PHP avacha</p>
        HTML;

        return new Response($content);
    }
}