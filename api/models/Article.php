<?php

namespace app\models;

use Yii;

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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MA_Serial', 'MA_Title', 'MA_ImgPath', 'MA_Keywords', 'MA_Tag', 'MA_Author', 'MA_Source', 'MA_Summary', 'MA_Content', 'MA_CreateBy', 'MA_UpdateBy'], 'string'],
            [['MA_Type', 'MA_FavorNum', 'MA_HitsCount', 'MA_Order', 'MA_Status'], 'integer'],
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
            'MA_FavorNum' => 'Ma  Favor Num',
            'MA_HitsCount' => 'Ma  Hits Count',
            'MA_Order' => 'Ma  Order',
            'MA_Status' => 'Ma  Status',
            'MA_CreateBy' => 'Ma  Create By',
            'MA_CreaetOn' => 'Ma  Creaet On',
            'MA_UpdateBy' => 'Ma  Update By',
            'MA_UpdateOn' => 'Ma  Update On',
        ];
    }
}
