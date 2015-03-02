<?php
namespace MicroFW\Http;

class Response implements IResponse
{
    /** @var $statusCode int */
    private $statusCode;

    /** @var $contentType string */
    private $contentType;

    /** @var $content string */
    private $content;

    /**
     * @param $content string
     * @param $statusCode int
     * @param $contentType string
     */
    public function __construct($content = '', $statusCode = 200, $contentType = 'text/html')
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->contentType = $contentType;
    }

    /**
     * @return null
     */
    public function getHeaders()
    {
        return null;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
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
