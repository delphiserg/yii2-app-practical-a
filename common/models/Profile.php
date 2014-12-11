<?php

namespace common\models;

use dektrium\user\models\Profile as BaseProfile;
use Yii;

/*
 * 
 */

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 *
 */
class Profile extends BaseProfile
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('user', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        return true;
    }
}
