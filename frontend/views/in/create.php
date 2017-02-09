<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\In */

$this->title = Yii::t('app', 'Create In');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="in-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
