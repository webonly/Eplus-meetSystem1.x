<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MInfo_ReputePhoto".
 *
 * @property integer $MP_ID
 * @property string $MP_Code
 * @property string $MP_Repute
 * @property string $MP_Path
 * @property integer $MP_Type
 * @property string $MP_CreateBy
 * @property string $MP_CreateOn
 */
class MInfoReputePhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_ReputePhoto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MP_Code', 'MP_CreateBy'], 'required'],
            [['MP_Code', 'MP_Repute', 'MP_Path', 'MP_CreateBy'], 'string'],
            [['MP_Type'], 'integer'],
            [['MP_CreateOn'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MP_ID' => 'Mp  ID',
            'MP_Code' => 'Mp  Code',
            'MP_Repute' => 'Mp  Repute',
            'MP_Path' => 'Mp  Path',
            'MP_Type' => 'Mp  Type',
            'MP_CreateBy' => 'Mp  Create By',
            'MP_CreateOn' => 'Mp  Create On',
        ];
    }
}
