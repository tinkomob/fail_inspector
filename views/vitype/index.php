<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ViTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы нарушений';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vi-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тип нарушения', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Название',
                'value' => 'title'
            ],
            // 'title',
            [
                'attribute' => 'Должность',
                'value' => 'position.title'
            ],
            [
                'attribute' => 'Тип',
                'value' => 'class'
            ],
            // 'position_id',
            // 'class',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
