<?php
namespace MicroFW\Core;

use MicroFW\Http\Request, MicroFW\Http\Response;

class Application
{
    /**
     * Start and setup the framework
     *
     * @return void
     */
    public static function setup()
    {
        $request = new Request();
        $response = new Response('Hello everyone!');

        echo($response->getContent());
    }
}
