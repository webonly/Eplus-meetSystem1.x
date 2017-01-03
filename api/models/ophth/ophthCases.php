<?php

namespace api\models\ophth;

use Yii;

/**
 * This is the model class for table "MInfo_Cases".
 *
 * @property integer $MC_ID
 * @property string $MC_Serail
 * @property string $MC_Title
 * @property string $MC_ImgPath
 * @property string $MC_Keywords
 * @property string $MC_Tag
 * @property string $MC_Author
 * @property string $MC_Source
 * @property string $MC_Summary
 * @property string $MC_Content
 * @property string $MC_FileCode
 * @property string $MC_PulishOn
 * @property integer $MC_HitsCount
 * @property integer $MC_Order
 * @property integer $MC_Status
 * @property string $MC_CreateBy
 * @property string $MC_CreateOn
 * @property string $MC_UpdateBy
 * @property string $MC_UpdateOn
 */
class ophthCases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Cases';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('threeDb');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MC_Serail', 'MC_Title', 'MC_ImgPath', 'MC_Keywords', 'MC_Tag', 'MC_Author', 'MC_Source', 'MC_Summary', 'MC_Content', 'MC_FileCode', 'MC_CreateBy', 'MC_UpdateBy'], 'string'],
            [['MC_PulishOn', 'MC_CreateOn', 'MC_UpdateOn'], 'safe'],
            [['MC_HitsCount', 'MC_Order', 'MC_Status'], 'integer'],
            [['MC_CreateBy', 'MC_CreateOn', 'MC_UpdateBy', 'MC_UpdateOn'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MC_ID' => 'Mc  ID',
            'MC_Serail' => 'Mc  Serail',
            'MC_Title' => 'Mc  Title',
            'MC_ImgPath' => 'Mc  Img Path',
            'MC_Keywords' => 'Mc  Keywords',
            'MC_Tag' => 'Mc  Tag',
            'MC_Author' => 'Mc  Author',
            'MC_Source' => 'Mc  Source',
            'MC_Summary' => 'Mc  Summary',
            'MC_Content' => 'Mc  Content',
            'MC_FileCode' => 'Mc  File Code',
            'MC_PulishOn' => 'Mc  Pulish On',
            'MC_HitsCount' => 'Mc  Hits Count',
            'MC_Order' => 'Mc  Order',
            'MC_Status' => 'Mc  Status',
            'MC_CreateBy' => 'Mc  Create By',
            'MC_CreateOn' => 'Mc  Create On',
            'MC_UpdateBy' => 'Mc  Update By',
            'MC_UpdateOn' => 'Mc  Update On',
        ];
    }
}
