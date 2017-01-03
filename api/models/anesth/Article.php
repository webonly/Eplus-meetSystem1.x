<?php

namespace api\models\anesth;

use Yii;

/**
 * This is the model class for table "MInfo_Article".
 *
 * @property integer $MA_ID
 * @property string $MA_Serial
 * @property integer $MA_Type
 * @property string $MA_Title
 * @property string $MA_ImgPath
 * @property string $MA_Keywords
 * @property string $MA_Tag
 * @property string $MA_Author
 * @property string $MA_Source
 * @property string $MA_Summary
 * @property string $MA_Content
 * @property string $MA_PublishOn
 * @property integer $MA_HitsCount
 * @property integer $MA_Order
 * @property integer $MA_Status
 * @property string $MA_CreateBy
 * @property string $MA_CreaetOn
 * @property string $MA_UpdateBy
 * @property string $MA_UpdateOn
 * @property integer $MA_IsHot
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Article';
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
            [['MA_Serial', 'MA_Title', 'MA_ImgPath', 'MA_Keywords', 'MA_Tag', 'MA_Author', 'MA_Source', 'MA_Summary', 'MA_Content', 'MA_CreateBy', 'MA_UpdateBy'], 'string'],
            [['MA_Type', 'MA_HitsCount', 'MA_Order', 'MA_Status', 'MA_IsHot'], 'integer'],
            [['MA_PublishOn', 'MA_CreaetOn', 'MA_UpdateOn'], 'safe'],
            [['MA_CreateBy', 'MA_CreaetOn', 'MA_UpdateBy', 'MA_UpdateOn'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MA_ID' => 'Ma  ID',
            'MA_Serial' => 'Ma  Serial',
            'MA_Type' => 'Ma  Type',
            'MA_Title' => 'Ma  Title',
            'MA_ImgPath' => 'Ma  Img Path',
            'MA_Keywords' => 'Ma  Keywords',
            'MA_Tag' => 'Ma  Tag',
            'MA_Author' => 'Ma  Author',
            'MA_Source' => 'Ma  Source',
            'MA_Summary' => 'Ma  Summary',
            'MA_Content' => 'Ma  Content',
            'MA_PublishOn' => 'Ma  Publish On',
            'MA_HitsCount' => 'Ma  Hits Count',
            'MA_Order' => 'Ma  Order',
            'MA_Status' => 'Ma  Status',
            'MA_CreateBy' => 'Ma  Create By',
            'MA_CreaetOn' => 'Ma  Creaet On',
            'MA_UpdateBy' => 'Ma  Update By',
            'MA_UpdateOn' => 'Ma  Update On',
            'MA_IsHot' => 'Ma  Is Hot',
        ];
    }
}
