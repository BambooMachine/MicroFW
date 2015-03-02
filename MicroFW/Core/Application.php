<?php
namespace MicroFW\Core;

use MicroFW\Http\Request;

class Application
{
    public static function setup()
    {
        $request = new Request();
    }
}
