<?php
namespace MicroFW\Http;

interface IRequest
{
    /**
     * @return string
     */
    public function getHost();

    /**
     * @return int
     */
    public function getPort();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return string
     */
    public function getPath();

    /**
     * @return array
     */
    public function getPOST();

    /**
     * @return array
     */
    public function getGET();

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return array
     */
    public function getCookies();
}
