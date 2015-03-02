<?php

require __DIR__ . '/../bootstrap.php';

use Tester\Assert;
use MicroFW\Core\Configurator;

test(function() {
    Assert::exception(
        function() {
            $c = new Configurator();
            $c->loadConfig(1);
        },
        '\\InvalidArgumentException'
    );
});
