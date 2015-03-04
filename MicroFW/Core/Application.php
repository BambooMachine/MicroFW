<?php
namespace MicroFW\Core;

use MicroFW\Http\Request;
use MicroFW\Http\Response;
use MicroFW\Templates\Template;
use MicroFW\Core\PHPConfigurator;
use MicroFW\Routing\Router;

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
        $urls = [];
        $urls['/test'] = new Response('TEST');
        $urls['/neco'] = new Response('NECO');
        $response = new Router($urls);

        echo($response->getResponse($request)->getContent());
    }
}
