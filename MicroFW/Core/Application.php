<?php
namespace MicroFW\Core;

use MicroFW\Http\Request, MicroFW\Http\Response, MicroFW\Core\Configurator;

class Application
{
    /**
     * Start and setup the framework
     *
     * @return void
     */
    public static function setup($projectPath)
    {
        $configurator = Configurator::createConfigurator($projectPath);
        Template::init($configurator);

        $request = new Request($configurator);
        $template = new Template('homepage.html', array());
        $response = new Response($template->render());

        echo($response->getContent());
    }
}
