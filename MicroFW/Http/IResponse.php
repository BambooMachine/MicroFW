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
     * @param $statusCode int
     * @return void
     */
    public function setStatusCode($statusCode);

    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @param $contentType string
     * @return void
     */
    public function setContentType($contentType);

    /**
     * @return string
     */
    public function getContentType();

    /**
     * @return void
     */
    public function send();
}
