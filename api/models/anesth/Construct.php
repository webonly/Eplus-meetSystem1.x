<?php

namespace api\models\anesth;

use Yii;

/**
 * This is the model class for table "MInfo_Construct".
 *
 * @property integer $MC_ID
 * @property string $MC_Serial
 * @property string $MC_Title
 * @property string $MC_Keywords
 * @property string $MC_Summary
 * @property string $MC_Content
 * @property integer $MC_HitsCount
 * @property integer $MC_Order
 * @property integer $MC_Status
 * @property string $MC_CreateBy
 * @property string $MC_CreateOn
 * @property string $MC_UpdateBy
 * @property string $MC_UpdateOn
 */
class Construct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MInfo_Construct';
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
            [['MC_Serial', 'MC_Title', 'MC_Keywords', 'MC_Summary', 'MC_Content', 'MC_CreateBy', 'MC_UpdateBy'], 'string'],
            [['MC_HitsCount', 'MC_Order', 'MC_Status'], 'integer'],
            [['MC_CreateBy', 'MC_CreateOn', 'MC_UpdateBy', 'MC_UpdateOn'], 'required'],
            [['MC_CreateOn', 'MC_UpdateOn'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MC_ID' => 'Mc  ID',
            'MC_Serial' => 'Mc  Serial',
            'MC_Title' => 'Mc  Title',
            'MC_Keywords' => 'Mc  Keywords',
            'MC_Summary' => 'Mc  Summary',
            'MC_Content' => 'Mc  Content',
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
