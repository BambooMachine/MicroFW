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
        $request = new Request($configurator);
        $response = new Response('Hello everyone!');

        echo($response->getContent());
    }
}
