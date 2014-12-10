<?php

return [
    'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
    'user' => [
        'identityClass' => 'common\models\User',
        'enableAutoLogin' => true,
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'errorHandler' => [
        'errorAction' => 'site/error',
    ],
    'view' => [
        'theme' => [
            'pathMap' => [
                '@dektrium/user/views' => '@app/views/user'
            ],
        ],
    ],
];
