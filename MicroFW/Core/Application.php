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
    public static function setup($projectPath, $configFile = 'config.php')
    {
        $configurator = Configurator::createConfigurator($projectPath, $configFile);
        Template::init($configurator);
        $request = new Request($configurator);
        $template = new Template('homepage.html', []);
        $response = new Response($template->render());

        echo($response->getContent());
    }
}
