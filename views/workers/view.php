<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Workers */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить сотрудника?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fio',
            'position_id',
            'team_id',
        ],
        'attributes' => [
            'id',
            [
                'attribute' => 'ФИО',
                'value' => $model->fio,
            ],
            [
                'attribute' => 'Должность',
                'value' => $model->position->title,
            ],
            [
                'attribute' => 'Бригада',
                'value' => $model->team->title,
            ],
        ],
    ]) ?>

</div>
