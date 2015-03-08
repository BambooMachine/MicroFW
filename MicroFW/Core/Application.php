<?php
namespace MicroFW\Core;

use MicroFW\Http\Request;
use MicroFW\Http\Response;
use MicroFW\Templating\Template;
use MicroFW\Core\PHPConfigurator;
use MicroFW\Routing\Router;
use MicroFW\Core\Exceptions\NotValidResponseException;
use MicroFW\Controllers\Exceptions\MethodNotAllowedException;

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
    public static function setup($projectPath, $configFile = 'config.php') {
        $configurator = PHPConfigurator::create($projectPath, $configFile);
        Template::init($configurator);
        $request = new Request($configurator);
        $router = new Router(include($projectPath . '/urls.php'));
        static::handleResponse($router, $request);
    }

    private static function handleResponse($router, $request)
    {
        try {
            $response = $router->getResponse($request);
        } catch (MethodNotAllowedException $e) {
            $response = new Response($e->getMessage(), 405);
        } catch (\Exception $e) {
            $response = new Response($e->getMessage());
        }

        echo($response->getContent());
    }
}
