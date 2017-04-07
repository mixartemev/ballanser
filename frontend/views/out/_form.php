<?php

use frontend\models\To;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Out */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="out-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'val')->textInput() ?>

    <?= $form->field($model, 'to_id')->dropDownList( ArrayHelper::map(To::find()->all(), 'id', 'name'), ['prompt' => 'Выбери категорию растрат']) ?>

    <?= $form->field($model, 'when')->widget('trntv\yii\datetime\DateTimeWidget', [
        'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm',
        'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm'
    ]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
