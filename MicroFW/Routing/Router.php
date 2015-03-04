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
            if ($url === $path) {
                $response = $res;
            }
        }
        return $response;
    }
}
