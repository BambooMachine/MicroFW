<?php
namespace MicroFW\Http;

interface IResponse
{
    /**
     * @return array
     */
    public function getHeaders();
    
    /**
     * @return int
     */
    public function getStatusCode();
    
    /**
     * @return string
     */
    public function getContentType();
    
    /**
     * @return string
     */
    public function getContent();
    
    /**
     * @return void
     */
    public function addContent();
}
