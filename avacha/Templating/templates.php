<?php declare(strict_types=1);

namespace Avacha\Templating;

use Avacha\Env\Config;
use Avacha\Http\Response;
use function Avacha\Filesystem\join_paths;

function render_template(string $name, array|null $parameters = []): string
{
    $template_path = join_paths(BASE_PATH, Config::$templates_path, $name) . '.latte';
    $template = new Template($template_path);
    $template_renderer = TemplateRenderer::getInstance();
    $html = $template_renderer->render($template, $parameters);

    return $html;
}

function respond_with_template(string $name, array|null $parameters = [], int $status = Response::OK, array $headers = []): Response
{
    $html = render_template($name, $parameters);
    $response = new Response($html, $status, $headers);

    return $response;
}