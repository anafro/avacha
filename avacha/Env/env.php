<?php declare(strict_types=1);

namespace Avacha\Env;

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

function env(string $key, mixed $default): mixed {
    if (!array_key_exists($key, $_ENV)) {
        return $default;
    }

    $variable = $_ENV[$key];

    if (in_array($variable, ['false', 'true']))
    {
        return $key === 'true';
    }

    return $variable;
}

function load_env_file(): void {
    try
    {
        $dotenv = Dotenv::createImmutable(BASE_PATH);
        $dotenv->load();
    }
    catch (InvalidPathException)
    {
    }
}