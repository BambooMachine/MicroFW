<?php
namespace MicroFW\Core;

class Configurator implements IConfigurator
{
    /** @var $config array */
    private $config;

    /**
     * @param $config array
     */
    public function __construct(array $config = null)
    {
        if (!is_null($config)) {
            $this->loadConfig($config);
        }
    }

    /**
     * @param $config array
     * @return void
     */
    public function loadConfig($config)
    {
        if (!is_array($config)) {
            throw new \InvalidArgumentException(
                'Parameter $config has to be of type array. ' . gettype($config) . ' given.'
            );
        }

        $this->config = $config;
    }

    /**
     * @TODO
     */
    public function parseConfig()
    {}

    /**
     * @param $key mixed
     * @return mixed
     */
    public function getValue($key)
    {
        if (!isset($this->config[$key])) {
            throw new \InvalidArgumentException("Key $key doesn't exists in given config.");
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
