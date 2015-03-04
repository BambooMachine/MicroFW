<?php
namespace MicroFW\Core;

class Configurator implements IConfigurator, \ArrayAccess
{
    /** @var array */
    private $config;

    /**
     * @param array
     */
    public function __construct(array $config = null)
    {
        if (!is_null($config)) {
            $this->loadConfig($config);
        }
    }

    /**
     * @param $key mixed
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->config[$key]);
    }

    /**
     * @param $key mixed
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->getValue($key);
    }

    /**
     * @param $key mixed
     * @return void
     */
    public function offsetUnset($key)
    {}

    /**
     * @param $key mixed
     * @param $value mixed
     * @return void
     */
    public function offsetSet($key, $value)
    {}

    /**
     * @param $config array
     * @return void
     */
    public function loadConfig($config)
    {
        if (!is_array($config)) {
            throw new \InvalidArgumentException(
                'Parameter $config has to be of type array. '
                . gettype($config) . ' given.'
            );
        }

        $this->config = $config;
        $this->parseConfig();
    }

    /**
     * @return void
     */
    public function parseConfig()
    {
    }

    /**
     * @param $key mixed
     * @return mixed
     */
    public function getValue($key)
    {
        if (!$this->offsetExists($key)) {
            throw new \InvalidArgumentException(
                "Key $key doesn't exists in given config."
            );
        }

        return $this->config[$key];
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->config;
    }
}
