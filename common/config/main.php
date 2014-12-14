<?php

return [
    'bootstrap' => [
        'page',
    ],
    'components' => require 'components.php',
    'modules' => require 'modules.php',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
];
