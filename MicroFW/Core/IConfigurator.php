<?php
namespace MicroFW\Core;

interface IConfigurator
{
    /**
     * @param $path array|string
     * @return void
     */
    public function loadConfig($config);

    /**
     * @return void
     */
    public function parseConfig();

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
