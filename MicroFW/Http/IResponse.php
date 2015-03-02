<?php
namespace MicroFW\Http;

interface IResponse
{
    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param $name string
     * @param $value string
     * @return void
     */
    public function setHeader($name, $value);

    /**
     * @param $name string
     * @return void
     */
    public function removeHeader($name);

    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @return string
     */
    public function getContentType();

    /**
     * @param $contentType string
     * @return void
     */
    public function setContentType($contentType);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return void
     */
    public function addContent($content);
}
