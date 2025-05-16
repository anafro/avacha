<?php declare(strict_types=1);

namespace Avacha\Templating;

use Latte\Engine;
use function Avacha\Assets\link_to_asset;

class TemplateRenderer
{
    private static TemplateRenderer $instance;
    private Engine $latte_engine;

    public function __construct()
    {
        $this->latte_engine = new Engine();
        $this->latte_engine->addFunction('link_to_asset', fn(string $asset_path) => link_to_asset($asset_path));
    }

    public static function getInstance(): TemplateRenderer
    {
        if (!isset(static::$instance))
        {
            static::$instance = new TemplateRenderer();
        }

        return static::$instance;
    }

    public function render(Template $template, array $parameters): string
    {
        $path = $template->path;
        $html = $this->latte_engine->renderToString($path, $parameters);

        return $html;
    }
}