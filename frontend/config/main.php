<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => require 'components.php',
    'modules' => require 'modules.php',
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            '*', // add or remove allowed actions to this list
        ]
    ],
    'params' => $params,
];
