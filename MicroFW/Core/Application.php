<?php
namespace MicroFW\Core;

use MicroFW\Http\Request;

class Application
{
    public static function setup()
    {
        $host = $_SERVER['HTTP_HOST'];
        $port = $_SERVER['SERVER_PORT'];
        $headers = getallheaders();
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['PATH_INFO'];
        $request = new Request($host, $port, $headers, $path, $method);
    }
}
