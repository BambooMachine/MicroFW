<?php
namespace MicroFW\Http;

interface IResponse
{
    public function getHeaders();
    public function getStatusCode();
    public function getContentType();
    public function getContent();
    public function addContent();
}
