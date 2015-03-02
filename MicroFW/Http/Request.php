<?php
namespace MicroFW\Http;

use MicroFW\Http\IRequest;

class Request implements IRequest
{
    private $host;
    private $port;
    private $headers;
    private $path;
    private $POST;
    private $GET;
    private $method;
    private $cookies;

    public function __construct()
    {
        $this->host = $_SERVER['HTTP_HOST'];
        $this->port = $_SERVER['SERVER_PORT'];
        $this->headers = getallheaders();
        $this->path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->POST = [];
        $this->GET = [];
        $this->cookies = [];
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getPOST()
    {
        return $this->POST;
    }

    public function getGET()
    {
        return $this->GET;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getCookies()
    {
        return $this->cookies;
    }
}
