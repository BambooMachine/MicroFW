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
     * @param $context array
     */
    public function __construct($templatePath, $context = [])
    {
        $templateDirs = self::$configurator['TEMPLATE_DIRS'];
        $this->templatePath = $templatePath;
        $this->findExistingTemplate($templateDirs);
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
        ob_start();
        $context = $this->context;
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
