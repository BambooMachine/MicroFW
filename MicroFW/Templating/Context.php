<?php
namespace MicroFW\Templating;

class Context
{
    /** @var array */
    private $context;

    public function __construct($context)
    {
        $this->context = $context;
    }

    public function __get($name)
    {
        return $this->context[$name];
    }
}
