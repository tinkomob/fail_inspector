<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ViolationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Нарушения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="violations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить нарушение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    
    // 'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'Сотрудник',
            'value' => 'worker.fio'
        ],
        [
            'attribute' => 'Бригада',
            'value' => 'worker.team.title'
        ],
        [
            'attribute' => 'Должность',
            'value' => 'worker.position.title'
        ],
        [
            'attribute' => 'Нарушение',
            'value' => 'type.title'
        ],
        [
            'attribute' => 'Время нарушения',
            'value' => 'date',
            'format' => ['date', 'php:d-m-Y H:i']
        ],
        [
        'class' => 'yii\grid\ActionColumn',
        'visible' => !Yii::$app->user->isGuest, 
        'urlCreator' => function( $action, $model, $key, $index ){

            if ($action == "update") {

                return Url::to(['violations/update', 'id' => $key]);

            }
            if ($action == "delete") {

                return Url::to(['violations/delete', 'id' => $key]);

            }
            if ($action == "view") {

                return Url::to(['violations/view', 'id' => $key]);

            }
        }
        ],
    ],
]); ?>


</div>
