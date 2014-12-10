<?php

return [
    'user' => [
        'class' => 'dektrium\user\Module',
        'components' => [
            'manager' => [
                'userClass' => 'common\models\User',
                'profileClass' => 'common\models\Profile',
            ],
        ],
        'enableUnconfirmedLogin' => true,
        'confirmWithin' => 21600,
        'cost' => 12,
        'admins' => ['admin']
    ],
];
