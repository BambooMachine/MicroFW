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

    public function __construct($host, $port, $headers, $path, $method)
    {
        $this->host = $host;
        $this->port = $port;
        $this->headers = $headers;
        $this->path = $path;
        $this->method = $method;
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
