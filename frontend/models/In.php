<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "in".
 *
 * @property integer $id
 * @property integer $val
 * @property integer $from_id
 * @property integer $user_id
 * @property string $when
 * @property string $comment
 *
 * @property From $from
 */
class In extends ActiveRecord
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
            [['val', 'from_id', 'user_id'], 'integer'],
            [['when'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['from_id'], 'exist', 'skipOnError' => true, 'targetClass' => From::className(), 'targetAttribute' => ['from_id' => 'id']],
	        [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'val' => 'Сколько',
            'from.name' => 'От куда',
            'user.username' => 'Кому',
            'when' => 'Когда',
            'comment' => 'Че',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrom()
    {
        return $this->hasOne(From::className(), ['id' => 'from_id']);
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
