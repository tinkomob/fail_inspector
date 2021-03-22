<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use app\models\Violations;
/* @var $this yii\web\View */

$this->title = 'Контроль нарушений';
?>
<div class="site-index">

    <div class="body-content">
        
    <div class="violations-index">
    <h1>Список нарушений</h1>
    
    <h2>Фильтр</h2>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    // 'id',
    [
        'attribute'=>'worker.fio',
        'label'=>'Сотрудник',
        'footer' => 'Всего нарушений: '.Violations::find()->count(),
    ],
    [
        'attribute' => 'Бригада',
        'value' => 'worker.team.title',
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
        'format' => ['date', 'php:d-m-Y H:i'],
    ],
    
    
    
    ['class' => 'kartik\grid\ActionColumn'],
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
    'toggleDataContainer' => ['class' => 'btn-group mr-2'],
    'showFooter' => true,
    // 'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute' => 'Сотрудник',
            'value' => 'worker.fio',
            'footer' => 'Всего нарушений: '.Violations::find()->count(),
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
            'value' => 'type.title',
        ],
        [
            'attribute' => 'Время нарушения',
            'value' => 'date',
            'format' => ['date', 'php:d-m-Y H:i']
        ],
        [
            'attribute' => 'Автор',
            'value' => 'author.full_name',
        ],
        [
        'class' => 'kartik\grid\ActionColumn',
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








</div>
    </div>
</div>
