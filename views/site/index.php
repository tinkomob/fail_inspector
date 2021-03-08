<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <?= Html::a('Добавить сотрудника', ['workers/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить тип нарушения', ['vitype/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить бригаду', ['team/create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="body-content">
        
    <div class="violations-index">

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Добавить нарушение', ['violations/create'], ['class' => 'btn btn-success']) ?>
</p>
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
<?php echo $this->render('_search', ['model' => $searchModel]); ?>


<?php echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'dropdownOptions' => [
        'label' => 'Экспорт',
        'class' => 'btn btn-outline-secondary'
    ]
]);
?>

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
    </div>
</div>
