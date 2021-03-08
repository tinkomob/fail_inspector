<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use app\models\Workers;
use app\models\ViType;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\select2\Select2
 

/* @var $this yii\web\View */
/* @var $model app\models\Violations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="violations-form">

    <?php $form = ActiveForm::begin(); ?>

    

       <?= 
       $form->field($model, 'worker_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Workers::find()->all(), 'id', 'fio', 'position.title'),
    'options' => ['placeholder' => 'Выберите сотрудника ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ])->label('Сотрудник'); 
?>
    <?php 
    if($model->date) {
        $model->date = date("d.m.Y H:i", (integer) $model->date);
    }    
    echo $form->field($model, 'date')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод даты/времени...', 'autocomplete' => 'off',],
        'convertFormat' => true,
        'value'=> date("d.m.Y HH:i",(integer) $model->date),
        'pluginOptions' => [
            // 'minDate'=>'0',
            'format' => 'dd.MM.yyyy HH:i',
            'autoclose'=>true,
            
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => date('d.m.Y HH:i'), //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ])->label('Время нарушения'); 
    ?>
    <?php 
        if ($model->isNewRecord) {
            $type_selected_data = '';
        } else{
            $type_selected_data = [$model->type_id => $model->type->title];
        }
    ?>
    <?=
        // $form->field($model, 'type_id')->widget(DepDrop::classname(), [
        //     'type' => DepDrop::TYPE_SELECT2,
        //     'options' => ['id' => 'subcat_id', 'placeholder' => 'Select ...'],
        //     'select2Options' => ['pluginOptions' => ['allowClear' => true]],
        //     'pluginOptions' => [
        //         'depends' => ['worker_id'],
        //         'url' => Url::to(['/violations/subcat1']),
        //         // 'params' => ['input-type-1', 'input-type-2']
        //     ]
        // ]);


    //     $form->field($model, 'worker_id')
    //  ->dropDownList(
    //              ArrayHelper::map(Workers::find()->all(), 'id', 'fio', 'position.title')
    //         , ['prompt'=>'- Выберите сотрудника -', 'id' => 'worker_id'])->label('Сотрдуник') 

        $form->field($model, 'type_id')->widget(DepDrop::classname(), [
            'options'=>['id'=>'type'],
            'data'=> [$type_selected_data],
            'pluginOptions'=>[
                'depends'=>['violations-worker_id'],
                'placeholder'=>'- Выберите нарушение -',
                'url'=>Url::to(['/violations/subcat']),
                // 'params'=> ['selected_id'], 
                // 'initialize' => true,
            ]
        ])->label('Тип нарушения');
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
