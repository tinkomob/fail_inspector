<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ViolationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Violations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="violations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Violations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'worker_id',
            'date',
            'type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
