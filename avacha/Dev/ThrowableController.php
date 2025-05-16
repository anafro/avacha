<?php

namespace Avacha\Dev;

use Avacha\Env\Config;
use Avacha\Http\Controller;
use Avacha\Http\Response;
use Throwable;
use function Avacha\Http\respond_with_status;
use function Avacha\Templating\respond_with_template;

class ThrowableController extends Controller
{
    public function handle(Throwable $throwable): Response
    {
        if (!Config::$debug) {
            return respond_with_status(Response::INTERNAL_SERVER_ERROR);
        }

        return respond_with_template('throwable', [
            'message' => $throwable->getMessage(),
            'trace' => $throwable->getTraceAsString(),
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine(),
        ]);
    }
}