<?php

return [
    'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
    ],
];
