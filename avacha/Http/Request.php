<?php declare(strict_types=1);

namespace Avacha\Http;

class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';
    public const PATCH = 'PATCH';
    public const HEAD = 'HEAD';
    public const OPTIONS = 'OPTIONS';
    public const TRACE = 'TRACE';
    public const CONNECT = 'CONNECT';

    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $cookies,
        public readonly array $files,
        public readonly array $server,
    )
    {
    }

    public static function collect(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    public string $method {
        get => $this->server['REQUEST_METHOD'];
    }

    public string $uri {
        get => $this->server['REQUEST_URI'];
    }

    public string $path {
        get => strtok($this->uri, '?');
    }
}