<?php declare(strict_types=1);

namespace Avacha\Templating;

class Template
{
    public function __construct(
        public readonly string $path
    )
    {
    }
}