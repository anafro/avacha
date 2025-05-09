<?php declare(strict_types=1);

use Avacha\Framework\Http\Kernel;
use Avacha\Framework\Http\Request;

define("BASE_PATH", dirname(__DIR__));
require_once BASE_PATH . '/vendor/autoload.php';

$kernel = new Kernel();
$request = Request::collect();
$response = $kernel->handle($request);

$response->send();