<?php
namespace MicroFW\Templates;

use MicroFW\Core\TemplateDoesNotExistException;
use MicroFW\Templates\Context;

class Template
{
    /** @var string */
    private $templatePath;

    /** @var string */
    private $fullTemplatePath;

    /** @var MicroFW\Tempalate\Context */
    private $context;

    /** @var MicroFW\Core\IConfigurator */
    private static $configurator;

    /**
     * @param $templatePath string
     * @param $context array
     */
    public function __construct($templatePath, $context = [])
    {
        $templateDir = self::$configurator['TEMPLATE_DIR'];
        $this->templatePath = $templatePath;
        $this->fullTemplatePath = $templateDir . '/' . $this->templatePath;
        $this->context = new Context($context);
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
        if (file_exists($this->fullTemplatePath)) {
            ob_start();
            $context = $this->context;
            include($this->fullTemplatePath);
            $content = ob_get_clean();
        } else {
            throw new TemplateDoesNotExistException(
                "$this->templatePath does not exist."
            );
        }

        return $content;
    }
}
