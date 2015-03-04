<?php
namespace MicroFW\Core;

use MicroFW\Core\ReadOnlyAttributeException;

class PHPConfigurator implements IConfigurator, \ArrayAccess
{
    /** @var array */
    private $config;

    /**
     * @param array
     */
    public function __construct(array $config)
    {
        $this->loadConfig($config);
    }

    /**
     * @param $projectPath string
     * @param $configFile string
     * @return MicroFW\Core\PHPConfigurator
     */
    public static function create($projectPath, $configFile)
    {
        $config = require_once($projectPath . '/' . $configFile);
        if (!is_array($config)) {
            throw new \InvalidArgumentException(
                'Configuration file must return array! '
                . gettype($config)
                . ' returned instead.'
            );
        }

        return new self($config);
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
    {
        throw new ReadOnlyAttributeException("$key is read-only!");
    }

    /**
     * @param $key mixed
     * @param $value mixed
     * @return void
     */
    public function offsetSet($key, $value)
    {
        throw new ReadOnlyAttributeException("$key is read-only!");
    }

    /**
     * @param $config array
     * @return void
     */
    public function loadConfig($config)
    {
        if (!is_array($config)) {
            throw new \InvalidArgumentException(
                'Parameter $config has to be of type array. '
                . gettype($config)
                . ' given.'
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
