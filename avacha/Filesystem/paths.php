<?php declare(strict_types=1);

namespace Avacha\Filesystem;

function join_paths(string ...$fragments): string
{
    $paths = [];

    foreach ($fragments as $fragment)
    {
        if ($fragment !== '')
        {
            $paths[] = $fragment;
        }
    }

    return preg_replace('#/+#', '/', join('/', $paths));
}
