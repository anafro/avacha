<?php declare(strict_types=1);

namespace Avacha\Framework\Http;

class Route
{
    public function __construct(
        public readonly string $method,
        public readonly string $path,
        public readonly array $handler,
    )
    {
    }

    /**
     * @return Route[]
     */
    public static function all(): array {
        return include BASE_PATH . '/routes.php';
    }
}