<?php

return [
    'datecontrol' => [
        'class' => 'kartik\datecontrol\Module',
        // format settings for displaying each date attribute
        'displaySettings' => [
            'date' => 'd-m-Y',
            'time' => 'H:i:s A',
            'datetime' => 'd-m-Y H:i:s A',
        ],
        // format settings for saving each date attribute
        'saveSettings' => [
            'date' => 'Y-m-d',
            'time' => 'H:i:s',
            'datetime' => 'Y-m-d H:i:s',
        ],
        // automatically use kartik\widgets for each of the above formats
        'autoWidget' => true,
    ],
    //Help module for kartik gii
    'gridview' => [
        'class' => 'kartik\grid\Module',
    ],
    'page' => [
        'class' => 'common\modules\page\Module',
    ],
    'user' => [
        'class' => 'dektrium\user\Module',
        'components' => [
            'manager' => [
                'userClass' => 'common\models\User',
                'profileClass' => 'common\models\Profile',
            ],
        ],
        'enableUnconfirmedLogin' => false,
        'confirmWithin' => 21600,
        'cost' => 12,
        'admins' => [ 'admin']
    ],
];
