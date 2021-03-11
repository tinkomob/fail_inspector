<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Violations */

$this->title = 'Изменение нарушения';
$this->params['breadcrumbs'][] = ['label' => 'Нарушения', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="violations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
