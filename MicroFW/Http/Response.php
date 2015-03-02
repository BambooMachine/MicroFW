<?php
namespace MicroFW\Http;

class Reponse implements IResponse
{
    private $statusCode;
    private $contentType;
    private $content;

    public function __construct($content = '', $statusCode = 200, $contentType = 'text/html')
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->contentType = $contentType;
    }

    public function getHeaders()
    {
        return null;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getContentType()
    {
        return $this->contentType;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function addContent($content)
    {
        $this->content .= $content;
    }
}
