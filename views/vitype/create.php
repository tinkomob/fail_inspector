<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ViType */

$this->title = 'Добавить тип нарушения';
$this->params['breadcrumbs'][] = ['label' => 'Типы нарушения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vi-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
