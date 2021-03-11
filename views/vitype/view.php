<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ViType */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Типы нарушений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vi-type-view">

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
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'attributes' => [
            'id',
            [
                'attribute' => 'Название нарушения',
                'value' => $model->title,
            ],
            // 'title',
            [
                'attribute' => 'Должность',
                'value' => isset($model->position->title) ? $model->position->title : "Для всех должностей",
            ],
            [
                'attribute' => 'Тип нарушения',
                'value' => $model->class,
            ],
        ],
    ]) ?>

</div>
