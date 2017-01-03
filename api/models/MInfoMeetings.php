<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "MInfo_Meetings".
 *
 * @property integer $MM_ID
 * @property string $MM_Serial
 * @property string $MM_Name
 * @property string $MM_Type
 * @property string $MM_Source
 * @property string $MM_StartDate
 * @property string $MM_EndDate
 * @property string $MM_Location
 * @property string $MM_Telephone
 * @property string $MM_Faxcode
 * @property string $MM_Contactor
 * @property string $MM_Email
 * @property string $MM_Address
 * @property string $MM_Content
 * @property string $MM_PublishOn
 * @property integer $MM_FavorNum
 * @property integer $MM_HitCount
 * @property integer $MM_Status
 * @property string $MM_CreateBy
 * @property string $MM_CreateOn
 * @property string $MM_UpdateBy
 * @property string $MM_UpdateOn
 */
class MInfoMeetings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Meetings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MM_Serial', 'MM_CreateBy', 'MM_CreateOn', 'MM_UpdateBy', 'MM_UpdateOn'], 'required'],
            [['MM_Serial', 'MM_Name', 'MM_Type', 'MM_Source', 'MM_Location', 'MM_Telephone', 'MM_Faxcode', 'MM_Contactor', 'MM_Email', 'MM_Address', 'MM_Content', 'MM_CreateBy', 'MM_UpdateBy'], 'string'],
            [['MM_StartDate', 'MM_EndDate', 'MM_PublishOn', 'MM_CreateOn', 'MM_UpdateOn'], 'safe'],
            [['MM_FavorNum', 'MM_HitCount', 'MM_Status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MM_ID' => 'Mm  ID',
            'MM_Serial' => 'Mm  Serial',
            'MM_Name' => 'Mm  Name',
            'MM_Type' => 'Mm  Type',
            'MM_Source' => 'Mm  Source',
            'MM_StartDate' => 'Mm  Start Date',
            'MM_EndDate' => 'Mm  End Date',
            'MM_Location' => 'Mm  Location',
            'MM_Telephone' => 'Mm  Telephone',
            'MM_Faxcode' => 'Mm  Faxcode',
            'MM_Contactor' => 'Mm  Contactor',
            'MM_Email' => 'Mm  Email',
            'MM_Address' => 'Mm  Address',
            'MM_Content' => 'Mm  Content',
            'MM_PublishOn' => 'Mm  Publish On',
            'MM_FavorNum' => 'Mm  Favor Num',
            'MM_HitCount' => 'Mm  Hit Count',
            'MM_Status' => 'Mm  Status',
            'MM_CreateBy' => 'Mm  Create By',
            'MM_CreateOn' => 'Mm  Create On',
            'MM_UpdateBy' => 'Mm  Update By',
            'MM_UpdateOn' => 'Mm  Update On',
        ];
    }
}
