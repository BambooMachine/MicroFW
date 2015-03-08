<?php
namespace MicroFW\Controllers;

use MicroFW\Controllers\IController;
use MicroFW\Controllers\Exceptions\MethodNotAllowedException;

class Controller implements IController
{
    /** @var IRequest */
    private $request;

    /** @var array */
    private $args;

    /** @var array */
    public static $allowedMethods = [
        'GET', 'POST'
    ];

    /**
     * @param $request IRequest
     * @param @args array
     */
    public function __construct($request, $args)
    {
        $this->request = $request;
        $this->args = $args;
    }

    public static function controller($request, $args = [])
    {
        $class = get_called_class();
        $controller = new $class($request, $args);
        $response = null;
        $method = $request->getMethod();
        if (in_array($method, static::$allowedMethods)) {
            $response = $controller->$method();
        } else {
            throw new MethodNotAllowedException("$method method is now allowed.");
        }

        return $response;
    }

    public function getContext()
    {
        return [];
    }

    public function GET()
    {
    }

    public function POST()
    {
    }
}
