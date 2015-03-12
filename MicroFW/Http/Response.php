<?php
namespace MicroFW\Http;

use MicroFW\Http\BaseResponse;

class Response extends BaseResponse
{
    /** @var string */
    private $content;

    /**
     * @param $content string
     * @param $statusCode int
     * @param $contentType string
     */
    public function __construct($content = '', $statusCode = 200, $contentType = 'text/html')
    {
        parent::__construct($statusCode, $contentType);
        $this->content = $content;
    }

    /**
     * @param $content string
     * @return void
     */
    public function addContent($content)
    {
        $this->content .= $content;
    }

    /**
     * @return void
     */
    public function send()
    {
        parent::send();

        echo($this->content);
    }
}
