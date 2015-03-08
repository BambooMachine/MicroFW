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
        switch ($method) {
            case 'GET':
                $response = $controller->GET();
                break;
            case 'POST':
                $response = $controller->POST();
                break;
        }

        return $response;
    }

    public function getContext()
    {
        return [];
    }

    public function GET()
    {
        throw new MethodNotAllowedException('GET method is not allowed.');
    }

    public function POST()
    {
        throw new MethodNotAllowedException('POST method is not allowed.');
    }
}
