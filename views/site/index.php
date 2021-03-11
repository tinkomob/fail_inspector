<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        
    <div class="violations-index">
    <h1>Список нарушений</h1>
    <?php
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    // 'id',
    [
        'attribute'=>'worker.fio',
        'label'=>'Сотрудник',
    ],
    
    [
        'attribute'=>'worker.position.title',
        'label'=>'Должность',
    ],
    [
        'attribute'=>'type.title',
        'label'=>'Тип нарушения',
    ],
    [
        'attribute'=>'date',
        'label'=>'Дата нарушения',
    ],
    
    
    
    ['class' => 'yii\grid\ActionColumn'],
];
?>
    <?php echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'dropdownOptions' => [
        'label' => 'Экспорт',
        'class' => 'btn btn-outline-secondary'
    ]
]); ?>
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
<?php

?>
<?php if (!Yii::$app->user->isGuest):  ?>
<h1>Управление</h1>

<p>
<?= Html::a('Добавить нарушение', ['violations/create'], ['class' => 'btn btn-primary']) ?> 
<?= Html::a('Добавить сотрудника', ['workers/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить тип нарушения', ['vitype/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить бригаду', ['team/create'], ['class' => 'btn btn-success']) ?>
    
</p>
<?php endif; ?>

<h1>Фильтр</h1>

<?php echo $this->render('_search', ['model' => $searchModel]); ?>







</div>
    </div>
</div>
