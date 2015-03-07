<?php
namespace MicroFW\Core;

use MicroFW\Http\Request;
use MicroFW\Http\Response;
use MicroFW\Templating\Template;
use MicroFW\Core\PHPConfigurator;
use MicroFW\Routing\Router;
use MicroFW\Core\Exceptions\NotValidResponseException;

class Application
{
    /**
     * Start and setup the framework
     *
     * @param $projectPath string
     * @param $configFile string
     * @param $allowDefaults bool
     * @return void
     */
    public static function setup(
        $projectPath,
        $configFile = 'config.php',
        $allowDefaults = false
    ) {
        $configurator = PHPConfigurator::create($projectPath, $configFile);
        Template::init($configurator);
        $request = new Request($configurator);
        $router = new Router(include($projectPath . '/urls.php'));
        try {
            $response = $router->getResponse($request);
        } catch (NotValidResponseException $e) {
            $response = new Response($e->getMessage());
        }

        echo($response->getContent());
    }
}
