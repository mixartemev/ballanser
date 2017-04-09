<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "to".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 *
 * @property Out[] $outs
 * @property To $parent
 * @property To[] $tos
 */
class To extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'to';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => To::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Куда',
            'parent.name' => 'Раздел',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOuts()
    {
        return $this->hasMany(Out::className(), ['to_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(To::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTos()
    {
        return $this->hasMany(To::className(), ['parent_id' => 'id']);
    }
}
