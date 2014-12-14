<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => require 'components.php',
    'modules' => require 'modules.php',
/*    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'admin/*', // add or remove allowed actions to this list
        ]
    ],*/
    'on beforeRequest' => function ($event) {
        //only authenticated users have access to backend
        if (Yii::$app->user->isGuest) {
            Yii::$app->response->redirect('/user/login', 401)->send();
        }
    },
    'params' => $params,
];
