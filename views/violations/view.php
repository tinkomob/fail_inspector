<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Violations */

$this->title = $model->worker->fio.' - '.$model->type->title;
$this->params['breadcrumbs'][] = ['label' => 'Нарушения', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="violations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить объект?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'Сотрудник',
                'value' => $model->worker->fio,
            ],
            // 'date',
            [
                'attribute' => 'Дата нарушения',
                'value' => $model->date,
            ],
            [
                'attribute' => 'Тип нарушения',
                'value' => $model->type->title,
            ],
        ],
    ]) ?>

</div>
