<?php
namespace MicroFW\Controllers;

use MicroFW\Http\Response;
use MicroFW\Controllers\IController;
use MicroFW\Controllers\Exceptions\MethodNotAllowedException;

class Controller implements IController
{
    /** @var IRequest */
    private $request;

    /** @var array */
    private $args;

    /** @var array */
    protected $allowedMethods = [
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

    /**
     * @param $request IRequest
     * @param $args array
     * @return IResponse
     */
    public static function controller($request, $args = [])
    {
        $class = get_called_class();
        $controller = new $class($request, $args);
        $response = null;
        $method = $request->getMethod();
        if (in_array($method, $controller->allowedMethods)) {
            $response = $controller->$method();
        } else {
            throw new MethodNotAllowedException("$method method is now allowed.");
        }

        return $response;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        return [];
    }

    /**
     * @return IResponse
     */
    public function GET()
    {
        return new Response('');
    }

    /**
     * @return IReponse
     */
    public function POST()
    {
        return new Response('');
    }
}
