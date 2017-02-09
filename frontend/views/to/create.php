<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\To */

$this->title = Yii::t('app', 'Create To');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="to-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
