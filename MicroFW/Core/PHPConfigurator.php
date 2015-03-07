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
        $this->config = $config;
        $this->loadDefaults();
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
        } else {
            $config = require_once($fullPath);
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
     * @return void
     */
    public function loadDefaults()
    {
        $defaults = IConfigurator::DEFAULT_VALUES;
        foreach ($defaults as $name => $value) {
            if (array_key_exists($name, $this->config) && is_array($value)) {
                $this->config[$name] = array_merge($this->config[$name], $value);
            } else if (!array_key_exists($name, $this->config)){
                $this->config[$name] = $value;
            }
        }
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
