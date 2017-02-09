<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Out */

$this->title = Yii::t('app', 'Create Out');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Outs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
