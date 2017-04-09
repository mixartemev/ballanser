<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "out".
 *
 * @property integer $id
 * @property integer $val
 * @property integer $to_id
 * @property integer $user_id
 * @property string $when
 * @property string $comment
 *
 * @property To $to
 */
class Out extends ActiveRecord
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
            [['val', 'to_id', 'user_id'], 'integer'],
            ['when', 'default', 'value' => date('Y-m-d')],
            [['comment'], 'string', 'max' => 255],
            [['to_id'], 'exist', 'skipOnError' => true, 'targetClass' => To::className(), 'targetAttribute' => ['to_id' => 'id']],
	        [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
	        'val' => Yii::t('app', 'How much'),
	        'to.name' => Yii::t('app', 'To'),
	        'user.username' => Yii::t('app', 'Who'),
	        'when' => Yii::t('app', 'When'),
	        'comment' => Yii::t('app', 'For WHAT'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTo()
    {
        return $this->hasOne(To::className(), ['id' => 'to_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function beforeSave( $insert ) {
    	$this->user_id = Yii::$app->user->id;
	    return parent::beforeSave( $insert );
    }
}
