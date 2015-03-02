<?php
namespace MicroFW\Http;

interface IRequest
{
    public function getHost();
    public function getPort();
    public function getHeaders();
    public function getPath();
    public function getPOST();
    public function getGET();
    public function getMethod();
    public function getCookies();
}
