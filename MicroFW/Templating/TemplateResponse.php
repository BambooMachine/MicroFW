<?php
namespace MicroFW\Http;

use MicroFW\Http\BaseResponse;
use MicroFW\Templating\Template;

class TemplateResponse extends Response
{
    /**
     * @param $templatePath string
     * @param $context array
     * @param $statusCode int
     * @param $contentType string
     */
    public function __construct(
        $templatePath,
        $context = [],
        $statusCode = 200,
        $contentType = 'text/html'
    )
    {
        $template = new Template($templatePath);
        $content = $template->render($context);
        parent::__construct($content, $statusCode, $contentType);
    }
}
