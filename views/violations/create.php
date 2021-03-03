<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Violations */

$this->title = 'Добавить нарушение';
$this->params['breadcrumbs'][] = ['label' => 'Violations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="violations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
