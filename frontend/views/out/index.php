<?php

use frontend\models\To;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Outs');
$this->params['breadcrumbs'][] = $this->title;
$model = new \frontend\models\Out();
?>
<div class="out-index">
    <?php $form = ActiveForm::begin(['action' => ['create'], 'layout' => 'inline']); ?>

    <?= $form->field($model, 'val')->textInput(['type' => 'number', 'placeholder' => 'Сколько!?']) ?>

    <?= $form->field($model, 'to_id')->dropDownList( ArrayHelper::map( To::find()->all(), 'id', 'name'), ['prompt' => 'Корневая категория']) ?>

    <?= $form->field($model, 'when')->widget('trntv\yii\datetime\DateTimeWidget', [
        'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm',
        'momentDatetimeFormat' => 'YYYY-MM-DD HH:mm',
        'clientOptions' => ['defaultDate' => date("m/d/Y H:i")],
    ]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true, 'placeholder' => 'На что именно!?']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '+ Еще потратила!'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <br>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'val:currency',
            'to.name',
            'when:datetime',
            'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
