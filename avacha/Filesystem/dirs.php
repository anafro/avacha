<?php

function make_dir(string $path): void
{
    if (!file_exists($path))
    {
        mkdir($path, recursive: true);
    }
}