<?php declare(strict_types=1);

namespace App\Controllers;

use Avacha\Http\Controller;
use Avacha\Http\Response;
use function Avacha\Templating\respond_with_template;

class HomeController extends Controller
{
    public function index(): Response
    {
        return respond_with_template('index');
    }
}