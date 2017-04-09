<?php

use frontend\models\From;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ins');
$this->params['breadcrumbs'][] = $this->title;
$model = new \frontend\models\In();
?>
<div class="in-index">

	<?php $form = ActiveForm::begin(['action' => ['create'], 'layout' => 'inline']); ?>

	<?= $form->field($model, 'val')->textInput(['type' => 'number', 'placeholder' => Yii::t('app', 'How much') . '?']) ?>

	<?= $form->field($model, 'from_id')->dropDownList( ArrayHelper::map( From::find()->all(), 'id', 'name')) ?>

	<?= $form->field($model, 'when')->textInput(['type' => 'date']) ?>

	<?= $form->field($model, 'comment')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'For what') . '?']) ?>

    <div class="form-group">
		<?= Html::submitButton(Yii::t('app', '+ I got cash again'), ['class' => 'btn btn-success']) ?>
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
				        Yii::$app->getUrlManager()->createUrl(['in/update','id' => $key]),
				        ['title' => Yii::t('app', 'Edit In ') . $model->comment]
			        ) . ' ' .
			               Html::tag('span', Yii::$app->formatter->currencyCode , [
				               'class' => 'text-' . ($model->when > date('Y-m-d') ? 'success' : 'danger')
			               ]);
		        },
                'contentOptions' => ['style' => 'text-align:right']
	        ],
            'from.name',
            'when:date',
            'comment',
            'user.username'
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
