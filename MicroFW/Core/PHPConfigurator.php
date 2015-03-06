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
        $fullPath = $projectPath . '/' . $configFile;
        if (!file_exists($fullPath)) {
            throw new \InvalidArgumentException(
                "Config file not found on $fullPath."
            );
        }
        $config = require_once($fullPath);

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
    public function loadConfig(array $config)
    {
        $this->config = $config;
        $this->parseConfig();
    }

    /**
     * @return void
     */
    private function parseConfig()
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
