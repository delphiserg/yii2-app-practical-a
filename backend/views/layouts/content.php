<?php

use dmstr\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Inflector;
use yii\widgets\Breadcrumbs;

$dsd = 1;
?>
<aside class="right-side">
    <section class="content-header">
        <h1>
            <?= Inflector::camel2words(Inflector::id2camel($this->context->module->id)) ?>
            <small><?= ($this->context->module->id !== Yii::$app->id) ? 'Module' : '' ?></small>
        </h1>
        <?=
        Breadcrumbs::widget(
                [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
        )
        ?>
    </section>
    <?php include 'content-menu.php' ?>
    <section c  lass="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

</aside>