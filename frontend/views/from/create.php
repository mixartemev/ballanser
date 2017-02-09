<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\From */

$this->title = Yii::t('app', 'Create From');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Froms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="from-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
