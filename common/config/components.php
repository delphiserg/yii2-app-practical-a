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
        'rules' => [
        ],
    ],
    'view' => [
        'theme' => [
            'pathMap' => [
                '@dektrium/user/views' => '@frontend/views/user'
            ],
        ],
    ],
];
