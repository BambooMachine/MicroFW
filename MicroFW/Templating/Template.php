<?php
namespace MicroFW\Templating;

use MicroFW\Core\Exceptions\TemplateDoesNotExistException;
use MicroFW\Templating\Context;

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
     */
    public function __construct($templatePath)
    {
        $templateDirs = self::$configurator['TEMPLATE_DIRS'];
        $this->templatePath = $templatePath;
        $this->findExistingTemplate($templateDirs);
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
     * @param $context array
     * @return string
     */
    public function render($context = [])
    {
        ob_start();
        $context = new Context($context);
        include($this->fullTemplatePath);
        $content = ob_get_clean();

        return $content;
    }

    private function findExistingTemplate($templateDirs)
    {
        foreach ($templateDirs as $dir) {
            $fullTemplatePath = $dir . '/' . $this->templatePath;
            if (file_exists($fullTemplatePath)) {
                $this->fullTemplatePath = $fullTemplatePath;
                return;
            }
        }

        throw new TemplateDoesNotExistException(
                "$this->templatePath does not exist."
        );
    }
}
