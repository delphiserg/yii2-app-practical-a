<?php

namespace common\modules\page\controllers;

use common\modules\page\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{

    public function actionIndex($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            $model = PageSearch::findPage($id);
            return $this->render('index', [
                        'model' => $model,
            ]);
        }
    }

}
