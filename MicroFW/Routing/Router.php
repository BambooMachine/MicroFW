<?php
namespace MicroFW\Routing;

use MicroFW\Http\Response;
use MicroFW\Http\IResponse;
use MicroFW\Core\Exceptions\NotValidResponseException;

class Router
{
    /** @var array */
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Return response for request based on URL.
     *
     * @param $request MicroFW\Http\Request
     * @return MicroFW\Http\Response
     */
    public function getResponse($request)
    {
        $path = $request->getPath();
        $response = new Response('<h1>404</h1>', 404);
        foreach ($this->routes as $url => $controller) {
            $matches = [];
            if (preg_match('/^[\/]{0,1}' . $url . '/', $path, $matches)) {
                $matches = $this->cleanRoutesParameters($matches);
                $response = $controller($request, $matches);
                break;
            }
        }
        if ($response instanceof IResponse) {
            return $response;
        } else {
            throw new NotValidResponseException(
                gettype($response) ." is not a response object."
            );
        }
    }

    private function cleanRoutesParameters($parameters)
    {
        $cleanedParameters = [];
        foreach ($parameters as $name => $value) {
            if (is_string($name)) {
                $cleanedParameters[$name] = $value;
            }
        }

        return $cleanedParameters;
    }
}
