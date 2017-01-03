<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MInfo_Activity".
 *
 * @property integer $MA_ID
 * @property string $MA_Code
 * @property string $MA_Name
 * @property string $MA_ImgUrl
 * @property string $MA_LinkUrl
 * @property string $MA_Summary
 * @property string $MA_PublishOn
 * @property integer $MA_FavorNum
 * @property integer $MA_HitCount
 * @property integer $MA_Status
 * @property string $MA_CreateBy
 * @property string $MA_CreateOn
 * @property string $MA_UpdateBy
 * @property string $MA_UpdateOn
 */
class MInfoActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MA_Code', 'MA_CreateBy', 'MA_CreateOn', 'MA_UpdateBy', 'MA_UpdateOn'], 'required'],
            [['MA_Code', 'MA_Name', 'MA_ImgUrl', 'MA_LinkUrl', 'MA_Summary', 'MA_CreateBy', 'MA_UpdateBy'], 'string'],
            [['MA_PublishOn', 'MA_CreateOn', 'MA_UpdateOn'], 'safe'],
            [['MA_FavorNum', 'MA_HitCount', 'MA_Status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MA_ID' => 'Ma  ID',
            'MA_Code' => 'Ma  Code',
            'MA_Name' => 'Ma  Name',
            'MA_ImgUrl' => 'Ma  Img Url',
            'MA_LinkUrl' => 'Ma  Link Url',
            'MA_Summary' => 'Ma  Summary',
            'MA_PublishOn' => 'Ma  Publish On',
            'MA_FavorNum' => 'Ma  Favor Num',
            'MA_HitCount' => 'Ma  Hit Count',
            'MA_Status' => 'Ma  Status',
            'MA_CreateBy' => 'Ma  Create By',
            'MA_CreateOn' => 'Ma  Create On',
            'MA_UpdateBy' => 'Ma  Update By',
            'MA_UpdateOn' => 'Ma  Update On',
        ];
    }
}
