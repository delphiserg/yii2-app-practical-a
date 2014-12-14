<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $path
 *
 * @property AlbumImage[] $albumImages
 * @property ArtSalonImage[] $artSalonImages
 * @property ArtSalon[] $artSalons
 * @property Profile[] $profiles
 */
class Image extends \yii\db\ActiveRecord
{

    /**
     *
     * @var type 
     */
    public $file;

    /**
     *
     * @var type 
     */
    public $filepath = '/files';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file'], 'safe'],
            [['filepath'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'path' => Yii::t('app', 'Path'),
        ];
    }

    /**
     * 
     * @param type $insert
     * @param type $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        $savePath = $this->getFullPath();
        $dir = pathinfo($savePath, PATHINFO_DIRNAME);
        if (!file_exists($dir)) {
            mkdir($dir, 0644, true);
        }
        if ($this->file->saveAs($savePath)) {
            
        }
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * 
     */
    public function beforeSave($insert)
    {
        //Unlink old file while update
        if (!$insert) {
            if (isset($this->oldAttributes['path'])) {
                $oldPath = $this->getPrefixPath() . $this->oldAttributes['path'];
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }
        }

        $ext = pathinfo($this->file->name, PATHINFO_EXTENSION);
        do {
            $this->path = $this->filepath . '/' . Yii::$app->security->generateRandomString(10) . '.' . strtolower($ext);
        } while (file_exists($this->getPrefixPath() . $this->path));
        return parent::beforeSave($insert);
    }

    /**
     * 
     */
    public function afterDelete()
    {
        if (file_exists($this->getFullPath())) {
            @unlink($this->getFullPath());
        }
        parent::afterDelete();
    }

    /**
     * 
     * @return type
     */
    private function getPrefixPath()
    {
        return Yii::getAlias('@webroot');
    }

    /**
     * 
     * @return type
     */
    private function getFullPath()
    {
        return Yii::getAlias('@webroot') . $this->path;
    }

}
