<?php

namespace api\models\anesth;

use Yii;

/**
 * This is the model class for table "MInfo_Repute".
 *
 * @property integer $MR_ID
 * @property string $MR_Code
 * @property string $MR_DocName
 * @property string $MR_Photo
 * @property string $MR_Job
 * @property string $MR_WorkPlace
 * @property string $MR_Specialty
 * @property string $MR_Summary
 * @property integer $MR_Order
 * @property integer $MR_Status
 * @property integer $MR_HitCount
 * @property string $MR_CreateBy
 * @property string $MR_CreateOn
 * @property string $MR_UpdateBy
 * @property string $MR_UpdateOn
 */
class Repute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Repute';
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
            [['MR_Code', 'MR_CreateBy', 'MR_CreateOn', 'MR_UpdateBy', 'MR_UpdateOn'], 'required'],
            [['MR_Code', 'MR_DocName', 'MR_Photo', 'MR_Job', 'MR_WorkPlace', 'MR_Specialty', 'MR_Summary', 'MR_CreateBy', 'MR_UpdateBy'], 'string'],
            [['MR_Order', 'MR_Status', 'MR_HitCount'], 'integer'],
            [['MR_CreateOn', 'MR_UpdateOn'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MR_ID' => 'Mr  ID',
            'MR_Code' => 'Mr  Code',
            'MR_DocName' => 'Mr  Doc Name',
            'MR_Photo' => 'Mr  Photo',
            'MR_Job' => 'Mr  Job',
            'MR_WorkPlace' => 'Mr  Work Place',
            'MR_Specialty' => 'Mr  Specialty',
            'MR_Summary' => 'Mr  Summary',
            'MR_Order' => 'Mr  Order',
            'MR_Status' => 'Mr  Status',
            'MR_HitCount' => 'Mr  Hit Count',
            'MR_CreateBy' => 'Mr  Create By',
            'MR_CreateOn' => 'Mr  Create On',
            'MR_UpdateBy' => 'Mr  Update By',
            'MR_UpdateOn' => 'Mr  Update On',
        ];
    }
}
