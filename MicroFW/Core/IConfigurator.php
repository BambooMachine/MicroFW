<?php
namespace MicroFW\Core;

interface IConfigurator
{
    /**
     * @param $configPath string
     * @param $configName string
     */
    public static function create($configPath, $configName);

    /**
     * @param $config array
     * @return void
     */
    public function loadConfig(array $config);

    /**
     * @param $key mixed
     * @return void
     */
    public function getValue($key);

    /**
     * @return array
     */
    public function getValues();
}
