<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Violations */

$this->title = 'Добавить нарушение';
$this->params['breadcrumbs'][] = ['label' => 'Нарушения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="violations-create">
<p>
<?= Html::a('Добавить сотрудника', ['workers/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить тип нарушения', ['vitype/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить бригаду', ['team/create'], ['class' => 'btn btn-success']) ?>
    
</p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
