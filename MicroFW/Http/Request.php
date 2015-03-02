<?php
namespace MicroFW\Http;

use MicroFW\Http\IRequest;

class Request implements IRequest
{
    /** @var $host string */
    private $host;

    /** @var $port int */
    private $port;

    /** @var $headers array */
    private $headers;

    /** @var $path string */
    private $path;

    /** @var $POST array */
    private $POST;

    /** @var $GET array */
    private $GET;

    /** @var $method string */
    private $method;

    /** @var $cookies array */
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
}
