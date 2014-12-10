<?php

/*
 * 
 */

namespace common\models;

use dektrium\user\helpers\ModuleTrait;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 *
 */
class Profile extends \dektrium\user\models\Profile
{
    use ModuleTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

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
            'name' => \Yii::t('user', 'Name'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQueryInterface
     */
    public function getUser()
    {
        return $this->hasOne($this->module->manager->userClass, ['id' => 'user_id']);
    }
}
