<?php
namespace MicroFW\Routing;

class Url
{
    /** @var string */
    private $regex;

    /** @var callable */
    private $callback;

    /** @var string */
    private $routeName;

    /**
     * @param $regex string
     * @param $callback callable
     * @param $routeName string
     */
    public function __construct($regex, $callback, $routeName)
    {
        $this->regex = $regex;
        $this->callback = $callback;
        $this->routeName = $routeName;
    }

    /**
     * @return string
     */
    public function getRegex()
    {
        return $this->regex;
    }

    /**
     * @return IResponse
     */
    public function callController($request, $args)
    {
        $response = call_user_func($this->callback, $request, $args);
        return $response;
    }

    /**
     * @return string
     */
    public function getRouteName()
    {
        return $this->routeName;
    }
}
