<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "in".
 *
 * @property integer $id
 * @property integer $val
 * @property integer $from_id
 * @property string $when
 * @property string $comment
 *
 * @property From $from
 */
class In extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['val'], 'required'],
            [['val', 'from_id'], 'integer'],
            [['when'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['from_id'], 'exist', 'skipOnError' => true, 'targetClass' => From::className(), 'targetAttribute' => ['from_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'val' => 'Val',
            'from_id' => 'From ID',
            'when' => 'When',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrom()
    {
        return $this->hasOne(From::className(), ['id' => 'from_id']);
    }
}
