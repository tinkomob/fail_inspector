<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Workers;
use app\models\ViType;
use app\models\Team;
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
    <div class="search_inputs">
    <?=  $form->field($model, 'worker_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Workers::find()->all(), 'id', 'fio', 'position.title'),
    'options' => ['placeholder' => 'Выберите сотрудника ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ])->label('По сотруднику');  ?>

<?= $form->field($model, 'type_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(ViType::find()->all(), 'id', 'title', 'class'),
    'options' => ['placeholder' => 'Выберите нарушение ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ])->label('По нарушению')  ?>
<?= $form->field($model, 'team_id')
     ->dropDownList(
                 ArrayHelper::map(Team::find()->all(), 'id', 'title')
            , ['prompt'=>'- Выберите бригаду -', 'id' => 'type_id'])->label('По бригаде') ?>


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
])->label('За период');
?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Фильтровать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сброс', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>  