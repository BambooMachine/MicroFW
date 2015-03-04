<?php
namespace MicroFW\Templates;

class Template
{
    /** @var string */
    private $templatePath;

    /** @var array */
    private $context;

    /** @var MicroFW\Core\IConfigurator */
    private static $configurator;

    /**
     * @param $templatePath string
     * @param $context array
     */
    public function __construct($templatePath, $context = [])
    {
        $this->templatePath = $templatePath;
        $this->context = $context;
    }

    /**
     * @param $configurator MicroFW\Core\IConfigurator
     * @return void
     */
    public static function init($configurator)
    {
        Template::$configurator = $configurator;
    }

    /**
     * Render template and return it.
     * @return string
     */
    public function render()
    {
        $templateDir = self::$configurator['TEMPLATE_DIR'];
        $fullPath = $templateDir . '/' . $templatePath;
        $content = file_get_contents($fullPath);

        return $content;
    }
}
