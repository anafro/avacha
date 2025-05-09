<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Avacha\Framework\Http\Controller;
use Avacha\Framework\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $content = <<<HTML
        <h1>Welcome to Avacha!</h1>
        <p>A supercharged PHP framework</p>
        HTML;

        return new Response($content);
    }
}