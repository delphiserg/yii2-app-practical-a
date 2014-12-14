<?php

namespace common\modules\page\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $tittle
 * @property string $content
 * @property string $name
 * @property string $active
 */
class Page extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'active'], 'string'],
            [['tittle'], 'string', 'max' => 512],
            [['name'], 'string', 'max' => 128],
            [['tittle', 'content'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tittle' => Yii::t('app', 'Tittle'),
            'content' => Yii::t('app', 'Content'),
            'name' => Yii::t('app', 'Name'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

}
