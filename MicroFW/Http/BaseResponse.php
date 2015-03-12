<?php
namespace MicroFW\Http;

use MicroFW\Http\IResponse;

class BaseResponse implements IResponse
{
    /** @var string */
    private $contentType;

    /** @var int */
    private $statusCode;

    /** @var array */
    private $headers;

    public function __construct($statusCode = 200, $contentType = 'text/html')
    {
        $this->contentType = $contentType;
        $this->statusCode = $statusCode;
        $this->headers = [];
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param $name string
     * @param $value string
     * @return void
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    /**
     * @param $name string
     * @return void
     */
    public function removeHeader($name)
    {
        unset($this->headers[$name]);
    }

    /**
     * @param $statusCode int
     * @return void
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $contentType string
     * @return void
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return void
     */
    public function send()
    {
        http_response_code($this->statusCode);
        $this->setHeader('Content-Type', $this->contentType);
        $this->sendHeaders();
    }

    private function sendHeaders()
    {
        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }
    }
}
