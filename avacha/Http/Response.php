<?php declare(strict_types=1);

namespace Avacha\Http;

class Response
{
    public const OK = 200;
    public const CREATED = 201;
    public const ACCEPTED = 202;
    public const NO_CONTENT = 204;
    public const MOVED_PERMANENTLY = 301;
    public const FOUND = 302;
    public const NOT_MODIFIED = 304;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const METHOD_NOT_ALLOWED = 405;
    public const CONFLICT = 409;
    public const UNPROCESSABLE_ENTITY = 422;
    public const INTERNAL_SERVER_ERROR = 500;
    public const NOT_IMPLEMENTED = 501;
    public const BAD_GATEWAY = 502;
    public const SERVICE_UNAVAILABLE = 503;

    public function __construct(
        private ?string $content = '',
        private int $status = Response::OK,
        private array $headers = [],
    )
    {
    }

    public function send(): void
    {
        echo $this->content;
    }
}