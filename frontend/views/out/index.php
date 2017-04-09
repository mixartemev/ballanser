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

    <?= $form->field($model, 'val')->textInput(['type' => 'number', 'placeholder' => Yii::t('app', 'How much?')]) ?>

    <?= $form->field($model, 'to_id')->dropDownList( ArrayHelper::map( To::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'when')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'For WHAT!?')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '+ Spend again'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <br>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
	        [
		        'attribute' => 'val',
		        'format' => 'raw',
		        'value' => function($model,$key){
			        return Html::a(
					        Yii::$app->formatter->asInteger($model->val),
					        Yii::$app->getUrlManager()->createUrl(['out/update','id' => $key]),
					        ['title' => Yii::t('app', 'Edit Out ') . $model->comment]
				        ) . ' ' . Yii::$app->formatter->currencyCode;
		        },
	        ],            'to.name',
            'when:date',
            'comment',
	        'user.username'
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
