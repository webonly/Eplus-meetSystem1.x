<?php

namespace api\models\anesth;

use Yii;

/**
 * This is the model class for table "MInfo_Image".
 *
 * @property integer $MI_Id
 * @property string $MI_Image1Path
 * @property string $MI_Image2Path
 * @property string $MI_Image3Path
 * @property string $MI_Image4Path
 * @property string $MI_Image1Url
 * @property string $MI_Image2Url
 * @property string $MI_Image3Url
 * @property string $MI_Image4Url
 * @property integer $MI_HitCount
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Image';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('secondDb');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MI_Id'], 'required'],
            [['MI_Id', 'MI_HitCount'], 'integer'],
            [['MI_Image1Path', 'MI_Image2Path', 'MI_Image3Path', 'MI_Image4Path', 'MI_Image1Url', 'MI_Image2Url', 'MI_Image3Url', 'MI_Image4Url'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MI_Id' => 'Mi  ID',
            'MI_Image1Path' => 'Mi  Image1 Path',
            'MI_Image2Path' => 'Mi  Image2 Path',
            'MI_Image3Path' => 'Mi  Image3 Path',
            'MI_Image4Path' => 'Mi  Image4 Path',
            'MI_Image1Url' => 'Mi  Image1 Url',
            'MI_Image2Url' => 'Mi  Image2 Url',
            'MI_Image3Url' => 'Mi  Image3 Url',
            'MI_Image4Url' => 'Mi  Image4 Url',
            'MI_HitCount' => 'Mi  Hit Count',
        ];
    }
}
