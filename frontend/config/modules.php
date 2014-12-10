<?php

return [
    'admin' => [
        'class' => 'mdm\admin\Module',        
        'controllerMap' => [
            'assignment' => [
                'class' => 'mdm\admin\controllers\AssignmentController',
                'userClassName' => 'common\models\User',
                'idField' => 'id',
            ]
        ],
        'layout' => 'left-menu',
    ],
];
