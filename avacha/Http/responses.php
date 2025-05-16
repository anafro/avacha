<?php declare(strict_types=1);

namespace Avacha\Http;

function respond_with_status(int $status): Response
{
    return new Response(status: $status);
}