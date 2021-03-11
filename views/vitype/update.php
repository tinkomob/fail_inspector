<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ViType */

$this->title = 'Изменить тип нарушения: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Типы нарушений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="vi-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
