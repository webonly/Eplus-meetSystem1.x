<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MInfo_Config".
 *
 * @property integer $MC_ID
 * @property integer $MC_Type
 * @property string $MC_Content
 * @property string $MC_UpdateBy
 * @property string $MC_UpdateOn
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MC_Type', 'MC_UpdateBy'], 'required'],
            [['MC_Type'], 'integer'],
            [['MC_Content', 'MC_UpdateBy'], 'string'],
            [['MC_UpdateOn'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MC_ID' => 'Mc  ID',
            'MC_Type' => 'Mc  Type',
            'MC_Content' => 'Mc  Content',
            'MC_UpdateBy' => 'Mc  Update By',
            'MC_UpdateOn' => 'Mc  Update On',
        ];
    }
}
