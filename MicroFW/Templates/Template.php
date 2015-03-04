<?php
namespace MicroFW\Templates;

use MicroFW\Core\TemplateDoesNotExistException;

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
        self::$configurator = $configurator;
    }

    /**
     * Render template and return it.
     * @return string
     */
    public function render()
    {
        $templateDir = self::$configurator['TEMPLATE_DIR'];
        $fullPath = $templateDir . '/' . $this->templatePath;
        if (file_exists($fullPath)) {
            ob_start();
            $context = $this->context;
            include($fullPath);
            $content = ob_get_clean();
        } else {
            throw new TemplateDoesNotExistException(
                "$this->templatePath does not exist."
            );
        }

        return $content;
    }
}
