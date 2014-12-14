<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\modules\page\models\Page $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="page-form">

    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'tittle' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Tittle...', 'maxlength' => 512]],
            'content' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Content...', 'rows' => 6]],
            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Name...', 'maxlength' => 128]],
            'active' => ['type' => Form::INPUT_CHECKBOX, 'options' => ['placeholder' => 'Enter Active...']],
        ]
    ]);
    echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end();
    ?>

</div>
