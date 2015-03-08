<?php
namespace MicroFW\Templating;

class Context
{
    /** @var array */
    private $context;

    /**
     * @param $context array
     */
    public function __construct($context)
    {
        $this->context = $context;
    }

    /**
     * @param $name string
     * @return mixed
     */
    public function __get($name)
    {
        return $this->context[$name];
    }
}
