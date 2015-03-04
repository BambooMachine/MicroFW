<?php
namespace MicroFW\Http;

use MicroFW\Http\IRequest;

class Request implements IRequest
{
    /** @var string */
    private $host;

    /** @var int */
    private $port;

    /** @var array */
    private $headers;

    /** @var string */
    private $path;

    /** @var array */
    private $POST;

    /** @var array */
    private $GET;

    /** @var string */
    private $method;

    /** @var array */
    private $cookies;

    public function __construct($configurator)
    {
        $this->host = $_SERVER['HTTP_HOST'];
        $this->port = $_SERVER['SERVER_PORT'];
        $this->headers = getallheaders();
        $this->path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->POST = $_POST;
        $this->GET = $_GET;
        $this->cookies = [];
        $this->configurator = $configurator;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getPOST()
    {
        return $this->POST;
    }

    /**
     * @return array
     */
    public function getGET()
    {
        return $this->GET;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * @return Configurator
     */
    public function getConfig()
    {
        return $this->configurator;
    }
}
