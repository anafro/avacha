<?php declare(strict_types=1);

use Avacha\Dev\ThrowableController;
use Avacha\Env\Config;
use function Avacha\Env\load_env_file;

load_env_file();
Config::load();

set_exception_handler(function(Throwable $throwable) {
    $error_controller = new ThrowableController();
    $response = $error_controller->handle($throwable);

    $response->send();
    die();
});
