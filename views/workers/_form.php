<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Position;
use app\models\Team;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Workers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true])->label('ФИО сотрудника') ?>

    <?= $form->field($model, 'position_id')
     ->dropDownList(
            ArrayHelper::map(Position::find()->asArray()->all(), 'id', 'title')
            )->label('Выберите должность') ?>

    <?= $form->field($model, 'team_id')
     ->dropDownList(
            ArrayHelper::map(Team::find()->asArray()->all(), 'id', 'title')
            )->label('Выберите бригаду') ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
