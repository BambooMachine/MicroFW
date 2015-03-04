<?php
namespace MicroFW\Templates;

class Template
{
    /**
     * @var string
     */
    private $templatePath;

    /**
     * @var array
     */
    private $context;

    /**
     * @var MicroFW\Core\Configurato
     */
    private static $configurator;

    public function __construct($templatePath, $context = array())
    {
        $this->templatePath = $templatePath;
        $this->context = $context;
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

    public static function init($configurator)
    {
        Template::$configurator = $configurator;
    }
}
