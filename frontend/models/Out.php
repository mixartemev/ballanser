<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "out".
 *
 * @property integer $id
 * @property integer $val
 * @property integer $to_id
 * @property string $when
 * @property string $comment
 *
 * @property To $to
 */
class Out extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'out';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['val'], 'required'],
            [['val', 'to_id'], 'integer'],
            [['when'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['to_id'], 'exist', 'skipOnError' => true, 'targetClass' => To::className(), 'targetAttribute' => ['to_id' => 'id']],
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
            'to_id' => 'To ID',
            'when' => 'When',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTo()
    {
        return $this->hasOne(To::className(), ['id' => 'to_id']);
    }
}
