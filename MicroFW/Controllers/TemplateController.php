<?php
namespace MicroFW\Controllers;

use MicroFW\Controllers\Controller;
use MicroFW\Templating\Template;
use MicroFW\Http\Response;

class TemplateController extends Controller
{
    /** @var string */
    protected $templateName;

    /**
     * @return IResponse
     */
    public function GET()
    {
        $context = $this->getContext();

        return $this->renderAndResponse($context);
    }

    /**
     * @param $context array
     * @return IReponse
     */
    private function renderAndResponse($context)
    {
        $template = new Template($this->templateName);

        return new Response($template->render($context));
    }
}
