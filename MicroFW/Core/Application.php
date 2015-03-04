<?php
namespace MicroFW\Core;

use MicroFW\Http\Request;
use MicroFW\Http\Response;
use MicroFW\Core\PHPConfigurator;
use MicroFW\Templates\Template;

class Application
{
    /**
     * Start and setup the framework
     *
     * @return void
     */
    public static function setup($projectPath, $configFile = 'config.php')
    {
        $configurator = PHPConfigurator::create($projectPath, $configFile);
        Template::init($configurator);
        $request = new Request($configurator);
        $template = new Template('homepage.html', []);
        $response = new Response($template->render());

        echo($response->getContent());
    }
}
