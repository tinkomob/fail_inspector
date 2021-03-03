<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ViType */

$this->title = 'Create Vi Type';
$this->params['breadcrumbs'][] = ['label' => 'Vi Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vi-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
