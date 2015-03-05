<?php
namespace MicroFW\Routing;

use MicroFW\Http\Response;

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
        foreach ($this->routes as $url => $res) {
            $matches = [];
            if (preg_match('/^[\/]{0,1}' . $url . '/', $path, $matches)) {
                $response = $res;
                $matches = $this->cleanRoutesParameters($matches);
                var_dump($matches);
                break;
            }
        }
        return $response;
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
