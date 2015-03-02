<?php
namespace MicroFW\Http;

use MicroFW\Http\IResponse;

class Response implements IResponse
{
    /** @var string */
    private $contentType;

    /** @var string */
    private $content;

    /**
     * @param $content string
     * @param $statusCode int
     * @param $contentType string
     */
    public function __construct($content = '', $statusCode = 200, $contentType = 'text/html')
    {
        $this->content = $content;
        $this->setContentType($contentType);

        http_response_code($statusCode);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return headers_list();
    }

    /**
     * @param $name string
     * @param $value string
     * @return void
     */
    public function setHeader($name, $value)
    {
        header($name . ': ' . $value);
    }

    /**
     * @param $name string
     * @return void
     */
    public function removeHeader($name)
    {
        header_remove($name);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return http_response_code();
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param $contentType string
     * @return void
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->setHeader('Content-Type', $contentType);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content string
     * @return void
     */
    public function addContent($content)
    {
        $this->content .= $content;
    }
}
