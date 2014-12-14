<?php

use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;

// mdm\admin menu
if (isset($this->params['nav-items'])) {
    echo '<section class="content-header">';
    echo Nav::widget([
        'options' => ['class' => 'nav nav-pills'],
        'items' => $this->params['nav-items'],
    ]);
    echo '</section>';
}

echo Nav::widget([
    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
]);
?>

