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
        $urls['test$'] = new Response('TEST');
        $urls['neco\/(?P<name>\w+)'] = new Response('NECO');
        $urls[''] = new Response('HOMEPAGE');
        $router = new Router($urls);
        $response = $router->getResponse($request);

        echo($response->getContent());
    }
}
