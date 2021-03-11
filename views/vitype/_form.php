<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Position;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ViType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vi-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название нарушения') ?>
    
    <?= $form->field($model, 'position_id')
     ->dropDownList(
                 ArrayHelper::map(Position::find()->all(), 'id', 'title')
            )->label('Должность') ?>

    <?= $form->field($model, 'class')->dropDownList([
    'Общее' => 'Общее',
    'Должность' => 'Должность',
])->label('Тип нарушения');?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
