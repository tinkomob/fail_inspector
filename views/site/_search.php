<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Workers;
use app\models\ViType;
use kartik\form\ActiveForm;
use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<?= $form->field($model, 'worker_id')
     ->dropDownList(
                 ArrayHelper::map(Workers::find()->all(), 'id', 'fio', 'position.title')
            , ['prompt'=>'- Выберите сотрудника -', 'id' => 'worker_id'])->label('Сотрдуник') ?>
<?= 
$form->field($model, 'date', [
    'addon'=>['prepend'=>['content'=>'<i class="fas fa-calendar-alt"></i>']],
    'options'=>['class'=>'drp-container form-group']
])->widget(DateRangePicker::classname(), [
    // 'useWithAddon'=>true,
    'name' => 'date_range_picker',
    'hideInput'=>true,
    'presetDropdown'=>true,
    'model'=>$model,
//     'containerTemplate' => '
//     <span class="form-control text-right">
//     <span class="pull-left">
//         <span class="range-value">{value}</span>
//     </span>
//     <b class="caret"></b>
//     {input}
// </span>',

    'attribute'=>'date',
    'startAttribute' => 'datetime_start',
    'endAttribute' => 'datetime_end',     

    'convertFormat'=>true,
    
    
    'language' => 'ru',
    'pluginOptions'=>[
        
        'timePicker'=>true,

        'timePickerIncrement'=>30,

        'format'=>'Y-m-d H:i',
        // 'clearBtn' => false,
        'locale'=>['format' => 'd-m-Y H:i'],


    ],
]);
// DateRangePicker::widget([
    
    
//     // 'options' => ['autocomplete' => 'off'],

// ]);
?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>  