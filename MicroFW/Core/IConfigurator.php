<?php
namespace MicroFW\Core;

interface IConfigurator
{
    /** @var array */
    const DEFAULT_VALUES = [
        'APP_DIR' => __DIR__,
        'TEMPLATE_DIRS' => [__DIR__ . '/templates/'],
        'ASSETS_DIR' => __DIR__ . '/assets/',
    ];

    /**
     * @param $config array
     * @return void
     */
    public function __construct(array $config);

    /**
     * @param $configPath string
     * @param $configName string
     */
    public static function create($configPath, $configName, $allowDefaults);

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
